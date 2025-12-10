<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationReceipt;
use App\Models\Donation;
use App\Models\EmailLog;
use Stripe\Webhook;
use Stripe\Stripe;

use App\Models\Donor;
use App\Models\Invoice;
use Stripe\Event;
use App\Models\Membership;
use App\Mail\MembershipConfirmation;
use Stripe\Event as StripeEvent;
use Stripe\StripeClient;
use Exception;

use Illuminate\Support\Facades\DB;
use App\Models\InvoiceAddress;

class StripeWebhookController extends Controller
{

    // public function handle(Request $request)
    // {
    //     Log::info('🎧 Stripe webhook received', ['payload' => $request->all()]);

    //     $endpoint_secret = config('services.stripe.webhook_secret');
    //     $payload = $request->getContent();
    //     $sig_header = $request->server('HTTP_STRIPE_SIGNATURE');

    //     try {
    //         $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    //     } catch (\UnexpectedValueException $e) {
    //         Log::error('❌ Stripe webhook invalid payload', ['error' => $e->getMessage()]);
    //         return response()->json(['error' => 'Invalid payload'], 400);
    //     } catch (\Stripe\Exception\SignatureVerificationException $e) {
    //         Log::error('❌ Stripe webhook invalid signature', ['error' => $e->getMessage()]);
    //         return response()->json(['error' => 'Invalid signature'], 400);
    //     }

    //     $stripe = new StripeClient(config('services.stripe.secret'));
    //     $eventType = $event->type;

    //     try {
    //         match ($eventType) {
    //             // 🔹 Tek seferlik ödeme tamamlandıysa
    //             'payment_intent.succeeded' => $this->handleOneTimeDonation($event->data->object),

    //             // 🔹 Abonelik başlatıldıysa
    //             'customer.subscription.created' => $this->handleSubscriptionCreated($event->data->object),

    //             // 🔹 Abonelik ödemesi başarılı olduysa
    //             'invoice.payment_succeeded' => $this->handleSubscriptionPayment($event->data->object),

    //             // 🔹 Abonelik iptal edildiyse
    //             'customer.subscription.deleted' => $this->handleSubscriptionCancelled($event->data->object),

    //             default => Log::info("ℹ️ Stripe event not handled: {$eventType}")
    //         };
    //     } catch (Exception $e) {
    //         Log::error('❌ Stripe webhook processing failed', [
    //             'event_type' => $eventType,
    //             'error' => $e->getMessage(),
    //             'trace' => $e->getTraceAsString(),
    //         ]);
    //         return response()->json(['error' => 'Webhook processing failed'], 500);
    //     }

    //     return response()->json(['status' => 'success']);
    // }

    // /**
    //  * ✅ Tek seferlik bağış işlemi
    //  */
    // protected function handleOneTimeDonation($stripePayment)
    // {
    //     $paymentId = $stripePayment->id;
    //     $stripeCustomerId = $stripePayment->customer;
    //     $email = $stripePayment->receipt_email ?? $stripePayment->charges->data[0]->billing_details->email ?? null;

    //     $donation = Donation::where('stripe_payment_id', $paymentId)->first();

    //     if (! $donation) {
    //         Log::warning("⚠️ Donation not found for payment intent: {$paymentId}");
    //         return;
    //     }

    //     $donation->update([
    //         'payment_status' => 'succeeded',
    //         'stripe_customer_id' => $stripeCustomerId,
    //     ]);

    //     // Eğer fatura istenmişse oluştur
    //     if ($donation->wants_invoice) {
    //         $invoice = Invoice::create([
    //             'donor_id' => $donation->donor_id,
    //             'donation_id' => $donation->id,
    //             'invoice_addresses_id' => $donation->invoice_address_id,
    //             'invoice_number' => 'INV-' . now()->format('Y') . '-' . str_pad($donation->id, 5, '0', STR_PAD_LEFT),
    //             'status' => 'issued',
    //             'issue_date' => now(),
    //             'amount' => $donation->amount,
    //             'currency' => $donation->currency,
    //         ]);

    //         $donation->update(['invoice_id' => $invoice->id]);
    //     }

    //     // E-posta gönder ve logla
    //     if ($email) {
    //         try {
    //             Mail::to($email)->send(new DonationReceipt($donation));

    //             EmailLog::create([
    //                 'donor_id' => $donation->donor_id,
    //                 'donation_id' => $donation->id,
    //                 'to_email' => $email,
    //                 'subject' => 'Donation Receipt',
    //                 'body' => 'Your donation has been successfully processed.',
    //                 'status' => 'sent',
    //             ]);
    //         } catch (Exception $e) {
    //             Log::error('📧 Donation mail failed', ['error' => $e->getMessage()]);
    //             EmailLog::create([
    //                 'donor_id' => $donation->donor_id,
    //                 'donation_id' => $donation->id,
    //                 'to_email' => $email,
    //                 'subject' => 'Donation Receipt',
    //                 'body' => $e->getMessage(),
    //                 'status' => 'failed',
    //                 'error_message' => $e->getMessage(),
    //             ]);
    //         }
    //     }

    //     Log::info("✅ One-time donation succeeded: {$donation->id}");
    // }

    // /**
    //  * ✅ Yeni abonelik başlatıldı (örneğin aylık/yıllık)
    //  */
    // protected function handleSubscriptionCreated($subscription)
    // {
    //     $stripeSubscriptionId = $subscription->id;
    //     $stripeCustomerId = $subscription->customer;
    //     $email = $subscription->customer_email ?? null;

    //     $donor = Donor::where('stripe_customer_id', $stripeCustomerId)->first();

    //     if (! $donor) {
    //         Log::warning("⚠️ No donor found for Stripe customer: {$stripeCustomerId}");
    //         return;
    //     }

    //     $membership = Membership::create([
    //         'donor_id' => $donor->id,
    //         'stripe_subscription_id' => $stripeSubscriptionId,
    //         'payment_status' => 'pending',
    //         'membership_status' => 'pending_verification',
    //         'start_date' => now(),
    //     ]);

    //     Log::info("✅ New subscription created for donor #{$donor->id}, membership #{$membership->id}");
    // }

    // /**
    //  * ✅ Abonelik ödemesi başarıyla alındı
    //  */
    // protected function handleSubscriptionPayment($invoiceObject)
    // {
    //     $stripeSubscriptionId = $invoiceObject->subscription;
    //     $amount = $invoiceObject->amount_paid / 100;

    //     $membership = Membership::where('stripe_subscription_id', $stripeSubscriptionId)->first();

    //     if (! $membership) {
    //         Log::warning("⚠️ No membership found for subscription: {$stripeSubscriptionId}");
    //         return;
    //     }

    //     $membership->update([
    //         'payment_status' => 'paid',
    //         'membership_status' => 'active',
    //     ]);

    //     // Gerekirse donation ve invoice kaydı oluştur
    //     $donation = Donation::create([
    //         'donor_id' => $membership->donor_id,
    //         'amount' => $amount,
    //         'currency' => 'EUR',
    //         'payment_status' => 'succeeded',
    //         'is_recurring' => true,
    //         'recurring_interval' => 'monthly',
    //         'stripe_payment_id' => $invoiceObject->payment_intent,
    //         'stripe_customer_id' => $invoiceObject->customer,
    //     ]);

    //     $invoice = Invoice::create([
    //         'donor_id' => $membership->donor_id,
    //         'membership_id' => $membership->id,
    //         'invoice_number' => 'INV-' . now()->format('Y') . '-' . str_pad($donation->id, 5, '0', STR_PAD_LEFT),
    //         'status' => 'issued',
    //         'issue_date' => now(),
    //         'amount' => $amount,
    //         'currency' => 'EUR',
    //     ]);

    //     $donation->update(['invoice_id' => $invoice->id]);
    //     Log::info("✅ Subscription payment processed for membership #{$membership->id}");
    // }

    // /**
    //  * ❌ Abonelik iptal edildi
    //  */
    // protected function handleSubscriptionCancelled($subscription)
    // {
    //     $stripeSubscriptionId = $subscription->id;
    //     $membership = Membership::where('stripe_subscription_id', $stripeSubscriptionId)->first();

    //     if ($membership) {
    //         $membership->update([
    //             'membership_status' => 'cancelled',
    //             'end_date' => now(),
    //         ]);

    //         Log::info("🚫 Subscription cancelled for membership #{$membership->id}");
    //     }
    // }

    // Eski 
    // public function handle(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));
    //     $payload = $request->getContent();
    //     $sig_header = $request->header('Stripe-Signature');
    //     $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    //     try {
    //         $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    //     } catch (\Exception $e) {
    //         Log::error('Stripe Webhook verification failed: ' . $e->getMessage());
    //         return response()->json(['status' => 'invalid'], 400);
    //     }

    //     // Log her zaman
    //     Log::info('Stripe Webhook Event: ' . $event->type, (array)$event->data->object);

    //     switch ($event->type) {
    //         case 'payment_intent.succeeded':
    //             $paymentIntent = $event->data->object;
    //             $donation = Donation::where('stripe_payment_id', $paymentIntent->id)->first();
    //             if ($donation) {
    //                 $donation->payment_status = 'succeeded';
    //                 $donation->save();

    //                 if ($donation->email) {
    //                     Mail::to($donation->email)->send(new DonationReceipt($donation));
    //                     EmailLog::create([
    //                         'donor_id' => $donation->donor_id,
    //                         'donation_id' => $donation->id,
    //                         'to_email' => $donation->email,
    //                         'subject' => 'Bağışınız için Teşekkürler',
    //                         'body' => 'Ödemeniz başarıyla alınmıştır.',
    //                         'status' => 'sent',
    //                     ]);
    //                 }
    //             }
    //             break;

    //         case 'invoice.payment_succeeded': // Subscription ödemesi
    //             $invoice = $event->data->object;
    //             $donation = Donation::where('stripe_payment_id', $invoice->subscription)->first();
    //             if ($donation) {
    //                 $donation->payment_status = 'succeeded';
    //                 $donation->save();
    //             }
    //             break;

    //         case 'invoice.payment_failed':
    //             $invoice = $event->data->object;
    //             $donation = Donation::where('stripe_payment_id', $invoice->subscription)->first();
    //             if ($donation) {
    //                 $donation->payment_status = 'failed';
    //                 $donation->save();
    //             }
    //             break;

    //         default:
    //             Log::info('Unhandled Stripe Event: ' . $event->type);
    //     }

    //     return response()->json(['status' => 'success']);
    // }

    // Yeni ama denenmedi
    // public function handle(Request $request)
    // {
    //     Stripe::setApiKey(env('STRIPE_SECRET'));

    //     $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');
    //     $payload = $request->getContent();
    //     $sig_header = $request->server('HTTP_STRIPE_SIGNATURE');

    //     try {
    //         $event = Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
    //     } catch (\UnexpectedValueException $e) {
    //         Log::error('Stripe webhook payload error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Invalid payload'], 400);
    //     } catch (\Stripe\Exception\SignatureVerificationException $e) {
    //         Log::error('Stripe webhook signature error: ' . $e->getMessage());
    //         return response()->json(['error' => 'Invalid signature'], 400);
    //     }

    //     Log::info("🔔 Stripe webhook received: {$event->type}");

    //     switch ($event->type) {

    //         // ✅ Tek seferlik ödeme başarılı
    //         case 'payment_intent.succeeded':
    //             $paymentIntent = $event->data->object;
    //             $donationId = $paymentIntent->metadata->donation_id ?? null;

    //             if ($donationId) {
    //                 $donation = Donation::find($donationId);
    //                 if ($donation) {
    //                     $donation->update(['payment_status' => 'succeeded']);

    //                     // Fatura oluştur
    //                     $invoice = Invoice::create([
    //                         'donation_id' => $donation->id,
    //                         'donor_id' => $donation->donor_id,
    //                         'amount' => $donation->amount,
    //                         'currency' => $donation->currency,
    //                         'status' => 'paid',
    //                         'stripe_invoice_id' => $paymentIntent->charges->data[0]->id ?? null,
    //                     ]);

    //                     // Mail gönder
    //                     $this->sendDonationMail($donation, 'Thank you for your one-time donation!', 'sent');

    //                     Log::info("✅ Donation succeeded: ID {$donation->id}");
    //                 }
    //             }
    //             break;

    //         // ✅ Abonelik başlatıldı
    //         case 'customer.subscription.created':
    //             $subscription = $event->data->object;
    //             $donationId = $subscription->metadata->donation_id ?? null;

    //             if ($donationId) {
    //                 $donation = Donation::find($donationId);
    //                 if ($donation) {
    //                     $donation->update([
    //                         'payment_status' => 'processing',
    //                         'stripe_payment_id' => $subscription->id,
    //                     ]);

    //                     $this->sendDonationMail($donation, 'Your subscription has started successfully.', 'sent');
    //                     Log::info("🔄 Subscription created for donation {$donation->id}");
    //                 }
    //             }
    //             break;

    //         // ✅ Abonelikte ödeme başarılı
    //         case 'invoice.payment_succeeded':
    //             $invoiceObj = $event->data->object;
    //             $donationId = $invoiceObj->lines->data[0]->metadata->donation_id ?? null;

    //             if ($donationId) {
    //                 $donation = Donation::find($donationId);
    //                 if ($donation) {
    //                     $donation->update(['payment_status' => 'succeeded']);

    //                     Invoice::create([
    //                         'donation_id' => $donation->id,
    //                         'donor_id' => $donation->donor_id,
    //                         'amount' => $donation->amount,
    //                         'currency' => $donation->currency,
    //                         'status' => 'paid',
    //                         'stripe_invoice_id' => $invoiceObj->id,
    //                     ]);

    //                     $this->sendDonationMail($donation, 'Your subscription payment succeeded!', 'sent');
    //                     Log::info("💸 Subscription payment succeeded for donation {$donation->id}");
    //                 }
    //             }
    //             break;

    //         // ❌ Ödeme başarısız
    //         case 'invoice.payment_failed':
    //         case 'payment_intent.payment_failed':
    //             $object = $event->data->object;
    //             $donationId = $object->metadata->donation_id ?? null;

    //             if ($donationId) {
    //                 $donation = Donation::find($donationId);
    //                 if ($donation) {
    //                     $donation->update(['payment_status' => 'failed']);
    //                     $this->sendDonationMail($donation, 'Your payment failed. Please try again.', 'failed');
    //                     Log::warning("❌ Donation payment failed: {$donation->id}");
    //                 }
    //             }
    //             break;

    //         // 🚫 Abonelik iptali
    //         case 'customer.subscription.deleted':
    //             $subscription = $event->data->object;
    //             $donationId = $subscription->metadata->donation_id ?? null;

    //             if ($donationId) {
    //                 $donation = Donation::find($donationId);
    //                 if ($donation) {
    //                     $donation->update(['payment_status' => 'canceled']);
    //                     $this->sendDonationMail($donation, 'Your subscription has been canceled.', 'sent');
    //                     Log::info("🚫 Subscription canceled for donation {$donation->id}");
    //                 }
    //             }
    //             break;

    //         default:
    //             Log::info("Unhandled Stripe event: {$event->type}");
    //     }

    //     return response()->json(['status' => 'success']);
    // }

    // /**
    //  * Bağışçıya mail gönder ve log kaydı oluştur
    //  */
    // private function sendDonationMail(Donation $donation, string $subject, string $status)
    // {
    //     try {
    //         Mail::to($donation->email)->send(new DonationReceipt($donation));

    //         EmailLog::create([
    //             'donor_id' => $donation->donor_id,
    //             'donation_id' => $donation->id,
    //             'to_email' => $donation->email,
    //             'subject' => $subject,
    //             'body' => 'Email sent successfully via webhook.',
    //             'status' => $status,
    //         ]);
    //     } catch (\Exception $e) {
    //         EmailLog::create([
    //             'donor_id' => $donation->donor_id,
    //             'donation_id' => $donation->id,
    //             'to_email' => $donation->email,
    //             'subject' => $subject,
    //             'body' => $e->getMessage(),
    //             'status' => 'failed',
    //             'error_message' => $e->getMessage(),
    //         ]);

    //         Log::error("❗ Mail sending failed for donation {$donation->id}: " . $e->getMessage());
    //     }
    // }

    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\UnexpectedValueException $e) {
            Log::error('Stripe webhook invalid payload: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            Log::error('Stripe webhook invalid signature: ' . $e->getMessage());
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        $stripe = new StripeClient(config('services.stripe.secret'));
        $type = $event->type;
        $object = $event->data->object;

        Log::info("Stripe webhook received: {$type}", ['id' => $event->id]);

        try {
            switch ($type) {
                case 'payment_intent.succeeded':
                    $this->handlePaymentIntentSucceeded($object);
                    break;

                case 'payment_intent.payment_failed':
                    $this->handlePaymentIntentFailed($object);
                    break;

                case 'invoice.payment_succeeded':
                    $this->handleInvoicePaymentSucceeded($object);
                    break;

                case 'invoice.payment_failed':
                    $this->handleInvoicePaymentFailed($object);
                    break;

                case 'customer.subscription.created':
                    $this->handleSubscriptionCreated($object);
                    break;

                case 'customer.subscription.updated':
                    $this->handleSubscriptionUpdated($object);
                    break;

                case 'customer.subscription.deleted':
                    $this->handleSubscriptionDeleted($object);
                    break;

                default:
                    Log::info('Stripe event not handled: ' . $type);
            }
        } catch (Exception $e) {
            Log::error('Error processing stripe event ' . $type . ': ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return response()->json(['error' => 'processing_failed'], 500);
        }

        return response()->json(['status' => 'ok']);
    }

    protected function handlePaymentIntentSucceeded($pi)
    {
        $paymentId = $pi->id;
        Log::info("Handling payment_intent.succeeded: {$paymentId}");

        $donation = Donation::where('stripe_payment_id', $paymentId)->with('donor')->first();
        if (! $donation) {
            Log::warning("Donation not found for PaymentIntent {$paymentId}");
            return;
        }

        // idempotent guard
        if ($donation->payment_status === 'succeeded') {
            Log::info("Donation {$donation->id} already succeeded - skipping");
            return;
        }

        DB::transaction(function () use ($donation, $pi) {
            $donation->update([
                'payment_status' => 'succeeded',
                'stripe_customer_id' => $donation->stripe_customer_id ?? ($pi->customer ?? null),
            ]);

            // Eğer fatura isteniyorsa invoice oluştur
            if ($donation->wants_invoice) {
                $this->createInvoiceForDonation($donation);
            }

            // Mail gönder
            $email = $donation->donor->email ?? ($pi->receipt_email ?? null);

            if ($email) {
                try {
                    Mail::to($email)->send(new DonationReceipt($donation));
                    EmailLog::create([
                        'donor_id' => $donation->donor_id,
                        'donation_id' => $donation->id,
                        'to_email' => $email,
                        'subject' => 'Donation Receipt',
                        'body' => 'PaymentIntent succeeded.',
                        'status' => 'sent',
                    ]);
                } catch (Exception $e) {
                    Log::error('Failed to send donation receipt: ' . $e->getMessage());
                    EmailLog::create([
                        'donor_id' => $donation->donor_id,
                        'donation_id' => $donation->id,
                        'to_email' => $email,
                        'subject' => 'Donation Receipt',
                        'body' => $e->getMessage(),
                        'status' => 'failed',
                        'error_message' => $e->getMessage(),
                    ]);
                }
            }
        });

        Log::info("PaymentIntent processed for donation {$donation->id}");
    }

    protected function handlePaymentIntentFailed($pi)
    {
        $paymentId = $pi->id;
        Log::warning("Handling payment_intent.payment_failed: {$paymentId}");

        $donation = Donation::where('stripe_payment_id', $paymentId)->first();
        if (! $donation) {
            Log::warning("Donation not found for failed PaymentIntent {$paymentId}");
            return;
        }

        $donation->update(['payment_status' => 'failed']);

        $email = $donation->email ?? optional($donation->donor)->email ?? ($pi->receipt_email ?? null);
        if ($email) {
            try {
                // Mail::to($email)->send(new \App\Mail\PaymentFailed($donation)); // opsiyonel Mailable
                EmailLog::create([
                    'donor_id' => $donation->donor_id,
                    'donation_id' => $donation->id,
                    'to_email' => $email,
                    'subject' => 'Payment failed',
                    'body' => 'Your payment failed. Please retry.',
                    'status' => 'sent',
                ]);
            } catch (Exception $e) {
                EmailLog::create([
                    'donor_id' => $donation->donor_id,
                    'donation_id' => $donation->id,
                    'to_email' => $email,
                    'subject' => 'Payment failed',
                    'body' => $e->getMessage(),
                    'status' => 'failed',
                    'error_message' => $e->getMessage(),
                ]);
            }
        }
    }

    protected function handleInvoicePaymentSucceeded($invoiceObj)
    {
        // invoiceObj can be invoice from subscription payment
        $invoiceId = $invoiceObj->id;
        $subscriptionId = $invoiceObj->subscription ?? null;
        $paymentIntentId = $invoiceObj->payment_intent ?? null;
        $amount = ($invoiceObj->amount_paid ?? 0) / 100;
        $customerId = $invoiceObj->customer ?? null;

        Log::info("Handling invoice.payment_succeeded invoice={$invoiceId} subscription={$subscriptionId} payment_intent={$paymentIntentId}");

        // 1) Eğer invoice metadata içinde donation_id varsa direkt donation'ı güncelle
        $donationId = $invoiceObj->lines->data[0]->metadata->donation_id ?? null;
        if ($donationId) {
            $donation = Donation::find($donationId);
            if ($donation && $donation->payment_status !== 'succeeded') {
                DB::transaction(function () use ($donation, $paymentIntentId, $amount, $invoiceId) {
                    $donation->update(['payment_status' => 'succeeded', 'stripe_payment_id' => $paymentIntentId]);
                    $invoice = $this->createInvoiceForDonation($donation, $amount, $invoiceId);
                    // mail
                    $this->sendDonationEmailAndLog($donation, $donation->email);
                });
            }
            return;
        }

        // 2) Eğer subscriptionId varsa membership'ı bul ve güncelle
        if ($subscriptionId) {
            $membership = Membership::where('stripe_subscription_id', $subscriptionId)->first();
            if (! $membership) {
                Log::warning("Membership not found for subscription: {$subscriptionId}");
                return;
            }

            DB::transaction(function () use ($membership, $amount, $paymentIntentId, $invoiceId, $customerId) {
                $membership->update([
                    'payment_status' => 'paid',
                    'membership_status' => 'active',
                ]);

                // yeni donation oluştur (abonelik ödemesi için)
                $donation = Donation::create([
                    'donor_id' => $membership->donor_id,
                    'donation_type' => 'individual',
                    'supported_project' => null,
                    'amount' => $amount,
                    'currency' => 'EUR',
                    'payment_method' => 'card',
                    'payment_status' => 'succeeded',
                    'stripe_payment_id' => $paymentIntentId,
                    'stripe_customer_id' => $customerId,
                    'recurring_interval' => 'monthly', // veya yearly, burayı invoiceObj lines ile tespit edebiliriz
                    'is_recurring' => true,
                ]);

                // invoice oluştur
                $invoice = $this->createInvoiceForMembership($membership, $donation, $amount, $invoiceId);

                // donation'a invoice id ekle
                $donation->update(['invoice_id' => $invoice->id]);

                // mail
                $donor = $membership->donor;
                $this->sendDonationEmailAndLog($donation, $donor->email ?? null);
            });

            return;
        }

        // 3) Eğer buraya geldiyse invoice ile eşleşecek donation yok — log et
        Log::warning("Invoice payment succeeded but couldn't map to donation or membership: invoice={$invoiceId}");
    }

    protected function handleInvoicePaymentFailed($invoiceObj)
    {
        $subscriptionId = $invoiceObj->subscription ?? null;
        $paymentIntentId = $invoiceObj->payment_intent ?? null;
        $customerId = $invoiceObj->customer ?? null;

        Log::warning("Handling invoice.payment_failed invoice={$invoiceObj->id}");

        // Eğer subscription var ise membership'ı bulup failed yap
        if ($subscriptionId) {
            $membership = Membership::where('stripe_subscription_id', $subscriptionId)->first();
            if ($membership) {
                $membership->update(['payment_status' => 'failed']);
                // mail bilgilendirme
                $donor = $membership->donor;
                if ($donor && $donor->email) {
                    try {
                        // Mail::to($donor->email)->send(new \App\Mail\PaymentFailed($membership)); // opsiyonel
                        EmailLog::create([
                            'donor_id' => $donor->id,
                            'membership_id' => $membership->id,
                            'to_email' => $donor->email,
                            'subject' => 'Subscription payment failed',
                            'body' => 'Your subscription payment failed.',
                            'status' => 'sent',
                        ]);
                    } catch (Exception $e) {
                        EmailLog::create([
                            'donor_id' => $donor->id,
                            'membership_id' => $membership->id,
                            'to_email' => $donor->email,
                            'subject' => 'Subscription payment failed',
                            'body' => $e->getMessage(),
                            'status' => 'failed',
                            'error_message' => $e->getMessage(),
                        ]);
                    }
                }
            }
        } else {
            // Tek seferlik ödeme başarısız ise donation'a bak
            if ($paymentIntentId) {
                $donation = Donation::where('stripe_payment_id', $paymentIntentId)->first();
                if ($donation) {
                    $donation->update(['payment_status' => 'failed']);
                }
            }
        }
    }

    protected function handleSubscriptionCreated($subscription)
    {
        $subId = $subscription->id;
        $customerId = $subscription->customer;
        Log::info("Subscription created: {$subId}");

        // Eğer membership zaten yoksa oluştur (şu durumda DonationController muhtemelen oluşturdu ama yedek)
        $donor = Donor::where('stripe_customer_id', $customerId)->first();
        if (! $donor) {
            Log::warning("No donor for subscription customer {$customerId}");
            return;
        }

        // $membership = Membership::firstOrCreate(
        //     ['stripe_subscription_id' => $subId],
        //     [
        //         'donor_id' => $donor->id,
        //         'payment_status' => 'pending',
        //         'membership_status' => 'pending_verification',
        //         'start_date' => now(),
        //     ]
        // );

        // Log::info("Subscription mapping created/confirmed for membership {$membership->id}");
    }

    protected function handleSubscriptionUpdated($subscription)
    {
        $subId = $subscription->id;
        Log::info("Subscription updated: {$subId}");
        // örn. status değişimi, trial bitişi, cancel_at_period_end vb. handle edilebilir
        $membership = Membership::where('stripe_subscription_id', $subId)->first();
        if (! $membership) return;

        // örnek: iptal isteği varsa membership.status güncelle
        if (isset($subscription->cancel_at_period_end) && $subscription->cancel_at_period_end) {
            $membership->update(['membership_status' => 'cancelled']);
        }
    }

    protected function handleSubscriptionDeleted($subscription)
    {
        $subId = $subscription->id;
        Log::info("Subscription deleted: {$subId}");

        $membership = Membership::where('stripe_subscription_id', $subId)->first();
        if ($membership) {
            $membership->update([
                'membership_status' => 'cancelled',
                'end_date' => now(),
            ]);
        }
    }

    // ----- yardımcı metodlar -----

    protected function createInvoiceForDonation(Donation $donation, $amount = null, $stripeInvoiceId = null)
    {
        $amount = $amount ?? $donation->amount;

        // idempotent: aynı donation_id varsa tekrar oluşturma
        $existing = Invoice::where('donation_id', $donation->id)->first();
        if ($existing) {
            Log::info("Invoice already exists for donation {$donation->id}");
            return $existing;
        }

        $invoiceNumber = $this->generateInvoiceNumber();

        $invoice = Invoice::create([
            'donor_id' => $donation->donor_id,
            'donation_id' => $donation->id,
            'invoice_addresses_id' => $donation->invoice_address_id,
            'invoice_number' => $invoiceNumber,
            'status' => 'issued',
            'issue_date' => now(),
            'amount' => $amount,
            'currency' => $donation->currency ?? 'EUR',
            'file_path' => null,
        ]);

        // bağışla ilişkilendir
        $donation->update(['invoice_id' => $invoice->id]);

        return $invoice;
    }

    protected function createInvoiceForMembership(Membership $membership, $donation, $amount = null, $stripeInvoiceId = null)
    {
        $amount = $amount ?? ($donation->amount ?? 0);

        // idempotent: membership + donation kombinasyonu ile kontrol
        $existing = Invoice::where('membership_id', $membership->id)->where('donation_id', $donation->id)->first();
        if ($existing) {
            Log::info("Invoice already exists for membership {$membership->id} donation {$donation->id}");
            return $existing;
        }

        $invoiceNumber = $this->generateInvoiceNumber();

        $invoice = Invoice::create([
            'donor_id' => $membership->donor_id,
            'donation_id' => $donation->id,
            'membership_id' => $membership->id,
            'invoice_addresses_id' => $donation->invoice_address_id,
            'invoice_number' => $invoiceNumber,
            'status' => 'issued',
            'issue_date' => now(),
            'amount' => $amount,
            'currency' => 'EUR',
            'file_path' => null,
        ]);

        return $invoice;
    }

    protected function generateInvoiceNumber(): string
    {
        $year = now()->year;
        $count = Invoice::whereYear('created_at', now()->year)->count() + 1;
        return "{$year}-" . str_pad($count, 4, '0', STR_PAD_LEFT);
    }

    protected function sendDonationEmailAndLog($donation, $email)
    {
        if (! $email) return;
        try {
            Mail::to($email)->send(new DonationReceipt($donation));
            EmailLog::create([
                'donor_id' => $donation->donor_id,
                'donation_id' => $donation->id,
                'to_email' => $email,
                'subject' => 'Donation receipt',
                'body' => 'Donation processed via webhook',
                'status' => 'sent',
            ]);
        } catch (Exception $e) {
            EmailLog::create([
                'donor_id' => $donation->donor_id,
                'donation_id' => $donation->id,
                'to_email' => $email,
                'subject' => 'Donation receipt',
                'body' => $e->getMessage(),
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);
            Log::error('Failed to send donation email: ' . $e->getMessage());
        }
    }
}
