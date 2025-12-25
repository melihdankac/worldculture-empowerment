<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Jobs\ProcessMembershipAfterPayment;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;
use App\Mail\SubscriptionPaymentReceipt;
use App\Mail\MembershipPaymentReceipt;
use App\Jobs\ProcessOneTimeAfterPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\Donation;
use App\Models\Invoice;
use App\Models\InvoiceAddress;
use App\Models\Membership;
use App\Models\MembershipPayment;
use App\Models\StripeEvent;
use App\Models\SubscriptionDonation;
use App\Models\SubscriptionPayment;

use Stripe\Webhook;
use Stripe\Stripe;

class StripeWebhookController extends Controller
{

    // NEW
    public function handle(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $payload   = $request->getContent();
        $signature = $request->header('Stripe-Signature');

        Log::info('Webhook Log Number: 401', [
            'Message: '
            => 'webhook çalıştı! ',
        ]);

        try {
            $event = \Stripe\Webhook::constructEvent(
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
            Log::info('Webhook Log Number: 402', [
                'Event Type' => $event->type,
                'Message: '
                => 'Webhookta DB transaction başladı ',
            ]);

            match ($event->type) {

                // ✅ ONE-TIME DONATION & Membership
                'payment_intent.succeeded' =>
                $this->handlePaymentIntentSucceeded($event->data->object),

                // ✅ SUBSCRIPTIONS (MONTH / YEAR / MEMBERSHIP)
                'invoice.finalized' =>
                $this->handleInvoicePaymentSucceeded($event->data->object),
                // 'invoice.payment_succeeded' =>
                // $this->handleInvoicePaymentSucceeded($event->data->object),

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

    // public function handle(Request $request)
    // {
    //     Stripe::setApiKey(config('services.stripe.secret'));
    //     Log::info('webhook çalıştı!');
    //     Log::info('Webhook Log Number: 401', [
    //         'Message: '
    //         => 'webhook çalıştı! ',
    //     ]);
    //     $payload   = $request->getContent();
    //     $signature = $request->header('Stripe-Signature');

    //     try {
    //         $event = Webhook::constructEvent(
    //             $payload,
    //             $signature,
    //             config('services.stripe.webhook_secret')
    //         );
    //     } catch (\Throwable $e) {
    //         Log::error('❌ Stripe webhook signature error', [
    //             'message' => $e->getMessage(),
    //         ]);
    //         return response()->json(['error' => 'Invalid signature'], 400);
    //     }

    //     Log::info('⚡ Stripe webhook received', [
    //         'event_id' => $event->id,
    //         'type'     => $event->type,
    //     ]);

    //     // ✅ Idempotency
    //     if (StripeEvent::where('stripe_event_id', $event->id)->exists()) {
    //         Log::info('🔁 Stripe event already processed', [
    //             'event_id' => $event->id
    //         ]);
    //         return response()->json(['status' => 'ignored']);
    //     }

    //     DB::transaction(function () use ($event) {
    //         Log::info('Webhook Log Number: 402', [
    //             'Event Type' => $event->type,
    //             'Message: '
    //             => 'Webhookta DB transaction başladı ',
    //         ]);

    //         match ($event->type) {

    //             // ✅ ONE-TIME DONATION & Membership
    //             'payment_intent.succeeded' =>
    //             $this->handlePaymentIntentSucceeded($event->data->object),

    //             // ✅ SUBSCRIPTIONS (MONTH / YEAR / MEMBERSHIP)
    //             'invoice.finalized' =>
    //             $this->handleInvoicePaymentSucceeded($event->data->object),
    //             // 'invoice.payment_succeeded' =>
    //             // $this->handleInvoicePaymentSucceeded($event->data->object),

    //             // ✅ SUBSCRIPTION CANCEL
    //             'customer.subscription.deleted' =>
    //             $this->handleSubscriptionDeleted($event->data->object),

    //             default => Log::info('ℹ Stripe event ignored', [
    //                 'type' => $event->type,
    //             ]),
    //         };

    //         StripeEvent::create([
    //             'stripe_event_id' => $event->id,
    //             'type'            => $event->type,
    //             'processed_at'    => now(),
    //         ]);
    //     });

    //     return response()->json(['status' => 'ok']);
    // }

    /**
     * ---------------------------------------
     * ONE-TIME DONATION
     * ---------------------------------------
     */
    protected function handlePaymentIntentSucceeded($intent)
    {
        Log::info('Webhook Log Number: 410', [
            'Message: '
            => 'Webhookta ONE-TIME succeeded başladı! ',
        ]);

        $metadata = $intent['metadata'];
        $type = $metadata['type'] ?? null;

        /**
         * 🏅 MEMBERSHIP PAYMENT
         */
        if ($type === 'membership') {
            Log::info('Webhook Membership İşlemi başladı!');

            $membershipId = $metadata['membership_id'] ?? null;
            $membership = Membership::find($membershipId);
            if (! $membership) return;

            $membership->update([
                'membership_status' => 'active',
                'start_date'        => now(),
                'end_date'          => now()->addYear(),
            ]);

            Log::info('Webhook Membership Update Tamam!');

            MembershipPayment::create([
                'membership_id' => $membership->id,
                'stripe_subscription_id' =>  $intent->id,
                'stripe_invoice_id' => $intent->id,
                'stripe_payment_id' => $intent->id,
                'amount' => $intent->amount_received / 100,
                'currency' => strtoupper($intent->currency),
                'status' => 'paid',
                'paid_at' => now(),
                'receipt_sent_at' => null,
            ]);

            Log::info('Webhook Membership Payment Create Tamam!');

            $membershipID = $membership->id;
            $intentID = $intent->id;
            ProcessMembershipAfterPayment::dispatch($membershipID, $intentID);

            Log::info('🏅 Membership payment succeeded', [
                'membership_id' => $membership->id,
            ]);

            return;
        }

        /**
         * One Time
         */
        if ($type === 'donation') {
            Log::info('Webhook One Time Donation İşlemi başladı!');

            $donorId = $intent->metadata->donor_id ?? null;

            $donation = Donation::where('stripe_payment_id', $intent->id)->latest()->first();

            if (! $donation) {
                Log::warning('⚠️ One-time donation intent succeeded but no pending donation found', [
                    'payment_intent' => $intent->id,
                    'donor_id'       => $donorId,
                ]);
                return;
            }

            $donation->update([
                'payment_status'     => 'paid',
                'amount'             => $intent->amount_received / 100,
                'currency'           => strtoupper($intent->currency),
            ]);

            Log::info('Webhook One Time Donationda Donation update tamam!');

            $donationID = $donation->id;
            $intentID = $intent->id;
            ProcessOneTimeAfterPayment::dispatch($donationID, $intentID);

            Log::info('📥 Job dispatch edildi', [
                'donation_id' => $donationID,
            ]);
        }

        Log::info('Webhook Log Number: 411', [
            'Message: '
            => '🏅 Tek Seferlik işlemler webhookta BİTTİ! Problem Yok ',
        ]);
    }

    /**
     * ---------------------------------------
     * SUBSCRIPTION & MEMBERSHIP
     * ---------------------------------------
     */
    protected function handleInvoicePaymentSucceeded($invoice)
    {
        Log::info('Webhook Log Number: 420', [
            'Message: '
            => 'Webhookta invoice.payment_succeeded başladı! (Abonelik Bağışı) ',
        ]);

        // Metadata'yı invoice.lines üzerinden al
        $lineItem = $invoice->lines->data[0] ?? null;
        $metadata = $lineItem?->metadata ?? [];

        $type = $metadata['type'] ?? null;

        /**
         * 🏅 MEMBERSHIP PAYMENT (Şuanda Aktif Değil)
         */
        if ($type === 'membership') {
            Log::info('Webhook Log Number: 431', [
                'Message: '
                => 'Webhook membership(Eski abonelik sistemi) İşlemi başladı! ',
            ]);
            $membershipId = $metadata['membership_id'] ?? null;
            $membership = Membership::with('donor')->find($membershipId);
            if (! $membership) return;

            $membershipPayment = MembershipPayment::create([
                'membership_id' => $membership->id,
                'stripe_subscription_id' =>  $membership->stripe_subscription_id,
                'stripe_invoice_id' => $invoice->id,
                'stripe_payment_id' => $invoice->payment_intent,
                'amount' => $invoice->amount_paid / 100,
                'currency' => strtoupper($invoice->currency),
                'status' => 'paid',
                'paid_at' => now()->setTimestamp($invoice->status_transitions->paid_at),
            ]);

            // 🔖 Fatura oluştur
            if ($membership->donor?->wants_invoice) {
                $invoiceAddress = $membership->donor()->invoiceAddresses()->latest()->first();
                $membershipPayment->invoices()->create([
                    'donor_id'           => $membership->donor_id,
                    'invoice_address_id' => $invoiceAddress->id,
                    'invoice_number'     => $this->generateInvoiceNumber(),
                    'status'             => 'issued',
                    'issue_date'         => now(),
                    'amount'             => $membershipPayment->amount,
                    'currency'           => $membershipPayment->currency,
                ]);
            }

            $membership->update([
                'membership_status' => 'pending_verification',
                'start_date'        => $membership->start_date ?? now(),
                'end_date'          => now()->addYear(),
            ]);


            Log::info('🏅 Membership payment succeeded', [
                'membership_id' => $membership->id,
            ]);
            return;
        }

        /**
         * 🔁 RECURRING DONATION (MONTH / YEAR)
         */
        if ($type === 'donation') {
            Log::info('Webhook Log Number: 421', [
                'Message: '
                => 'Webhook Aylık/Yıllık Donation İşlemi başladı! ',
            ]);

            // 1. Abonelik ana kaydını güncelle
            $subscriptionDonation = SubscriptionDonation::updateOrCreate(
                [
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
            Log::info('Webhook SubscriptionDonation Update or Create!');


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
                Log::info('Webhook subscriptionPayment Create!');
            }

            Mail::to($subscriptionPayment->subscriptionDonation->donor->email)->send(
                new SubscriptionPaymentReceipt($subscriptionDonation)
            );

            Log::info('Webhook Aylık/Yıllık bağış Mail gönderildi!');

            Log::info('🔁 Subscription payment recorded', [
                'subscriptionPayment' => $subscriptionPayment->wants_invoice,
                'invoice_id'      => $invoice->id,
            ]);

            // 🔖 Fatura oluştur
            if ($metadata['wants_invoice']) {
                $invoiceAddress = InvoiceAddress::where('donor_id', $metadata['donor_id'])->latest()->first();

                $subscriptionPayment->invoices()->create([
                    'donor_id'           => $subscriptionDonation->donor_id,
                    'invoice_address_id' => $invoiceAddress->id,
                    'invoice_number'     => $this->generateInvoiceNumber(),
                    'status'             => 'issued',
                    'issue_date'         => now(),
                    'amount'             => $subscriptionDonation->amount,
                    'currency'           => $subscriptionDonation->currency,
                ]);
            }
        }

        Log::info('Webhook Log Number: 422', [
            'Message: '
            => 'Webhookta invoice.payment_succeeded Bitti! (Abonelik Bağışı) ',
        ]);
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
