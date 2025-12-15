<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;
use App\Mail\SubscriptionPaymentReceipt;
use App\Mail\MembershipPaymentReceipt;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Donation;
use App\Models\Invoice;
use App\Models\Membership;
use App\Models\MembershipPayment;
use App\Models\StripeEvent;
use App\Models\SubscriptionDonation;
use App\Models\SubscriptionPayment;

use Stripe\Webhook;
use Stripe\Stripe;

class StripeWebhookController extends Controller
{

    public function handle(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        Log::info('webhook çalıştı!');
        $payload   = $request->getContent();
        $signature = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $signature,
                config('services.stripe.webhook_secret')
            );
        } catch (\Throwable $e) {
            Log::error('❌ Stripe webhook signature error', [
                'message' => $e->getMessage(),
            ]);
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        Log::info('⚡ Stripe webhook received', [
            'event_id' => $event->id,
            'type'     => $event->type,
        ]);

        // ✅ Idempotency
        if (StripeEvent::where('stripe_event_id', $event->id)->exists()) {
            Log::info('🔁 Stripe event already processed', [
                'event_id' => $event->id
            ]);
            return response()->json(['status' => 'ignored']);
        }


        DB::transaction(function () use ($event) {

            match ($event->type) {

                // ✅ ONE-TIME DONATION
                'payment_intent.succeeded' =>
                $this->handlePaymentIntentSucceeded($event->data->object),

                // ✅ SUBSCRIPTIONS (MONTH / YEAR / MEMBERSHIP)
                'invoice.payment_succeeded' =>
                $this->handleInvoicePaymentSucceeded($event->data->object),

                // ✅ SUBSCRIPTION CANCEL
                'customer.subscription.deleted' =>
                $this->handleSubscriptionDeleted($event->data->object),

                default => Log::info('ℹ Stripe event ignored', [
                    'type' => $event->type,
                ]),
            };

            StripeEvent::create([
                'stripe_event_id' => $event->id,
                'type'            => $event->type,
                'processed_at'    => now(),
            ]);
        });

        return response()->json(['status' => 'ok']);
    }

    /**
     * ---------------------------------------
     * ONE-TIME DONATION
     * ---------------------------------------
     */
    protected function handlePaymentIntentSucceeded($intent)
    {
        $donorId = $intent->metadata->donor_id ?? null;

        $donation = Donation::where('donor_id', $donorId)
            ->where('payment_status', 'pending')
            ->latest()
            ->first();

        if (! $donation) {
            Log::warning('⚠️ One-time donation intent succeeded but no pending donation found', [
                'payment_intent' => $intent->id,
                'donor_id'       => $donorId,
            ]);
            return;
        }

        $donation->update([
            'payment_status'     => 'paid',
            'stripe_payment_id'  => $intent->id,
            'amount'             => $intent->amount_received / 100,
            'currency'           => strtoupper($intent->currency),
        ]);

        Log::info('✅ One-time donation paid', [
            'donation_id'    => $donation->id,
            'payment_intent' => $intent->id,
            'donor_id'       => $donorId,
        ]);

        // event(new DonationSucceeded($donation));
        Mail::to($donation->donor->email)->send(
            new DonationReceipt($donation)
        );

        // 🔖 Fatura oluştur
        if ($donation->wants_invoice) {
            $invoiceAddress = $donation->donor->invoiceAddresses()->latest()->first();
            Invoice::create([
                'donor_id'          => $donation->donor_id,
                'invoiceable_id'    => $donation->id,
                'invoiceable_type'  => Donation::class,
                'invoice_address_id' => $invoiceAddress?->id,
                'invoice_number'    => $this->generateInvoiceNumber(),
                'status'            => 'issued',
                'issue_date'        => now(),
                'amount'            => $donation->amount,
                'currency'          => $donation->currency,
            ]);
        }
    }

    protected function handleInvoicePaymentSucceeded($invoice)
    {
        // Metadata'yı invoice.lines üzerinden al
        $lineItem = $invoice->lines->data[0] ?? null;
        $metadata = $lineItem?->metadata ?? [];

        $type = $metadata['type'] ?? null;

        /**
         * 🏅 MEMBERSHIP PAYMENT
         */
        if ($type === 'membership') {

            $membership = Membership::find($metadata->membership_id ?? null);
            if (! $membership) return;

            $membershipPayment = MembershipPayment::create([
                'membership_id'     => $membership->id,
                'stripe_invoice_id' => $invoice->id,
                'amount'            => $invoice->amount_paid / 100,
                'currency'          => strtoupper($invoice->currency),
                'status'            => 'paid',
                'paid_at'           => now(),
            ]);

            $membership->update([
                'membership_status' => 'pending_verification',
                'start_date'        => $membership->start_date ?? now(),
                'end_date'          => now()->addYear(),
            ]);

            // event(new MembershipPaymentSucceeded($membership));
            // Örnek: Üyelik ödemesi
            Mail::to($membership->donor->email)->send(
                new MembershipPaymentReceipt($membership)
            );


            Log::info('🏅 Membership payment succeeded', [
                'membership_id' => $membership->id,
            ]);

            // 🔖 Fatura oluştur
            if ($membership->donor?->wants_invoice) {
                $invoiceAddress = $membership->donor->invoiceAddresses()->latest()->first();
                Invoice::create([
                    'donor_id'          => $membership->donor_id,
                    'invoiceable_id'    => $membershipPayment->id,
                    'invoiceable_type'  => MembershipPayment::class,
                    'invoice_address_id' => $invoiceAddress?->id,
                    'invoice_number'    => $this->generateInvoiceNumber(),
                    'status'            => 'issued',
                    'issue_date'        => now(),
                    'amount'            => $membershipPayment->amount,
                    'currency'          => $membershipPayment->currency,
                ]);
            }

            return;
        }

        /**
         * 🔁 RECURRING DONATION (MONTH / YEAR)
         */
        if ($type === 'donation') {
            // 1. Abonelik ana kaydını güncelle
            $subscriptionDonation = SubscriptionDonation::updateOrCreate(
                [
                    'stripe_subscription_id' => $invoice->subscription,
                    'donor_id'               => $metadata['donor_id'] ?? null,
                ],
                [
                    'amount'             => $invoice->amount_paid / 100,
                    'currency'           => strtoupper($invoice->currency),
                    'recurring_interval' => $metadata['interval'] ?? null,
                    'status'             => 'active',
                    'started_at'         => $invoice->status === 'paid' ? now() : null,
                    // ended_at burada güncellenmez, iptal/expire webhooklarında set edilir
                ]
            );

            if ($subscriptionDonation) {
                $subscriptionPayment = SubscriptionPayment::create([
                    'subscription_donation_id' => $subscriptionDonation->id,
                    'stripe_invoice_id'        => $invoice->id,
                    'stripe_payment_id'        => $invoice->payment_intent,
                    'amount'                   => $invoice->amount_paid / 100,
                    'currency'                 => strtoupper($invoice->currency),
                    'status'                   => 'paid',
                    'paid_at'                  => now(),
                ]);

                // event(new SubscriptionPaymentSucceeded($subscriptionPayment));

                Log::info('🔁 Subscription payment recorded', [
                    'subscription_id' => $invoice->subscription,
                    'invoice_id'      => $invoice->id,
                ]);
            }

            Mail::to($subscriptionPayment->subscriptionDonation->donor->email)->send(
                new SubscriptionPaymentReceipt($subscriptionDonation)
            );

            // 🔖 Fatura oluştur
            if ($subscriptionDonation->donor?->wants_invoice) {
                $invoiceAddress = $subscriptionDonation->donor->invoiceAddresses()->latest()->first();
                Invoice::create([
                    'donor_id'          => $subscriptionDonation->donor_id,
                    'invoiceable_id'    => $subscriptionPayment->id,
                    'invoiceable_type'  => SubscriptionPayment::class,
                    'invoice_address_id' => $invoiceAddress?->id,
                    'invoice_number'    => $this->generateInvoiceNumber(),
                    'status'            => 'issued',
                    'issue_date'        => now(),
                    'amount'            => $subscriptionPayment->amount,
                    'currency'          => $subscriptionPayment->currency,
                ]);
            }
        }
    }

    /**
     * ---------------------------------------
     * SUBSCRIPTION CANCEL
     * ---------------------------------------
     */
    protected function handleSubscriptionDeleted($subscription)
    {
        Donation::where('stripe_subscription_id', $subscription->id)
            ->update(['payment_status' => 'cancelled']);

        Membership::where('stripe_subscription_id', $subscription->id)
            ->update([
                'membership_status' => 'cancelled',
                'end_date'          => now(),
            ]);

        Log::info('⛔ Subscription cancelled', [
            'subscription_id' => $subscription->id,
        ]);
    }


    /**
     * ---------------------------------------
     * HELPER FUNCTION
     * ---------------------------------------
     */
    protected function generateInvoiceNumber(): string
    {
        // Yıl bilgisini al
        $year = now()->year;

        // O yıl içinde kaçıncı fatura olduğunu bul
        $lastInvoice = Invoice::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastInvoice && $lastInvoice->invoice_number) {
            // Son numarayı al ve artır
            $parts = explode('-', $lastInvoice->invoice_number);
            $lastNumber = intval(end($parts));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // İlk fatura → 0001
            $newNumber = '0001';
        }

        return $year . '-' . $newNumber;
    }
}
