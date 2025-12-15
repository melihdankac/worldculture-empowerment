<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Donor;
use App\Models\Donation;
use App\Models\InvoiceAddress;
use App\Models\Membership;
use App\Models\SubscriptionDonation;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Subscription;
use Stripe\Product;
use Stripe\Price;

use Stripe\Checkout\Session as CheckoutSession;

class DonationController extends Controller
{

    public function process(Request $request)
    {
        $request->validate([
            'donation_type'       => ['required', 'in:individual,anonymous,company'],
            'recurring_interval' => ['required', 'in:one_time,month,year,membership'],
            'amount'              => ['required_if:recurring_interval,one_time,month,year', 'numeric', 'min:1'],
            'first_name'          => ['required', 'string'],
            'last_name'           => ['required', 'string'],
            'email'               => ['required', 'email'],
            'stripe_payment_method' => ['required', 'string'],
        ]);

        DB::beginTransaction();

        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            /**
             * DONOR
             */
            $donor = Donor::updateOrCreate(
                ['email' => $request->email],
                [
                    'first_name'   => $request->first_name,
                    'last_name'    => $request->last_name,
                    'phone'        => $request->phone,
                    'company_name' => $request->donation_type === 'company' ? $request->company_name : null,
                    'is_company'   => $request->donation_type === 'company',
                ]
            );

            /**
             * STRIPE CUSTOMER
             */
            if (! $donor->stripe_customer_id) {
                $customer = \Stripe\Customer::create([
                    'email' => $donor->email,
                    'name'  => "{$donor->first_name} {$donor->last_name}",
                ]);

                $donor->update(['stripe_customer_id' => $customer->id]);
            } else {
                $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
            }

            /**
             * PAYMENT METHOD
             */
            \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
                ->attach(['customer' => $customer->id]);

            \Stripe\Customer::update($customer->id, [
                'invoice_settings' => [
                    'default_payment_method' => $request->stripe_payment_method,
                ],
            ]);

            $clientSecret = null;

            /**
             * ONE-TIME DONATION
             */
            if ($request->recurring_interval === 'one_time') {

                $intent = \Stripe\PaymentIntent::create([
                    'amount'   => $request->amount * 100,
                    'currency' => 'eur',
                    'customer' => $customer->id,
                    'payment_method' => $request->stripe_payment_method,
                    'confirm'  => false,
                    'metadata' => [
                        'type'     => 'donation',
                        'donor_id' => $donor->id,
                    ],
                ]);

                Donation::create([
                    'donor_id' => $donor->id,
                    'donation_type' => $request->donation_type,
                    'supported_project'   => $request->supported_project,
                    'amount'   => $request->amount,
                    'currency' => 'EUR',
                    'payment_method' => $request->stripe_payment_method,
                    'payment_status' => 'pending',
                    'stripe_customer_id' => $customer->id,
                    'wants_invoice' => $request->wants_invoice,
                    'message' => $request->message,
                ]);

                $clientSecret = $intent->client_secret;
            }

            /**
             * Subscription DONATION (Month - Year)
             */
            if (in_array($request->recurring_interval, ['month', 'year'])) {

                // 1. Price oluştur
                $price = \Stripe\Price::create([
                    'unit_amount' => $request->amount * 100,
                    'currency'    => 'eur',
                    'recurring'   => [
                        'interval' => $request->recurring_interval,
                    ],
                    'product_data' => [
                        'name' => 'Recurring Donation',
                    ],
                ]);

                $description = $request->recurring_interval === 'year' ?
                    'Yearly donation subscription' :
                    'Monthly donation subscription';

                // 2. Subscription oluştur
                $subscription = \Stripe\Subscription::create([
                    'customer' => $customer->id,
                    'expand' => ['latest_invoice.payment_intent'],
                    'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
                    'payment_behavior' => 'error_if_incomplete',
                    'items' => [['price' => $price->id]],
                    'metadata' => [
                        'type'     => 'donation',
                        'interval' => $request->recurring_interval,
                        'donor_id' => $donor->id,
                    ],
                    'description' => $description,
                ]);

                // Subscription Donation oluştur
                SubscriptionDonation::create([
                    'donor_id'               => $donor->id,
                    'supported_project'      => $request->supported_project,
                    'amount'                 => $request->amount,
                    'currency'               => 'EUR',
                    'recurring_interval'     => $request->recurring_interval,
                    'stripe_subscription_id' => $subscription->id,
                    'status'                 => 'active',
                    'started_at'             => now(),
                ]);

                $invoice = $subscription->latest_invoice;
                $paymentIntent = $invoice->payment_intent ?? null;

                $clientSecret = $paymentIntent && is_object($paymentIntent)
                    ? $paymentIntent->client_secret
                    : null;
            }

            /**
             * MEMBERSHIP – FIXED 120 €
             */
            if ($request->recurring_interval === 'membership') {

                $membership = Membership::create([
                    'donor_id' => $donor->id,
                    'membership_status' => 'pending',
                    'start_date'        => null,
                    'end_date'          => null,
                ]);

                $subscription = \Stripe\Subscription::create([
                    'customer' => $customer->id,
                    'expand' => ['latest_invoice.payment_intent'],
                    'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
                    'payment_behavior' => 'error_if_incomplete',
                    'items' => [['price' => config('services.stripe.prices.membership_year')]],
                    'metadata' => [
                        'type' => 'membership',
                        'interval' => 'year',
                        'membership_id' => (string) $membership->id,
                    ],
                    'description' => 'Association Membership',
                ]);

                // 3. Stripe subscription ID’yi Membership kaydına yaz
                $membership->update([
                    'stripe_subscription_id' => $subscription->id,
                ]);

                // 4. İlk ödeme için client_secret döndür (frontend için)
                $invoice        = $subscription->latest_invoice;
                $paymentIntent  = $invoice->payment_intent ?? null;
                $clientSecret   = $paymentIntent && is_object($paymentIntent)
                    ? $paymentIntent->client_secret
                    : null;
            }

            if ($request->wants_invoice) {
                InvoiceAddress::create([
                    'donor_id'      => $donor->id,
                    'street'        => $request->street,
                    'street_number' => $request->street_number,
                    'zip'           => $request->zip,
                    'city'          => $request->city,
                    'country'       => $request->country,
                ]);
            }


            DB::commit();

            if ($request->recurring_interval === 'one_time') {
                return response()->json([
                    'success' => true,
                    'client_secret' => $clientSecret,
                ]);
            } else {
                return response()->json([
                    'success' => true,
                    'invoice_status' =>  $invoice->status,
                    'client_secret' => $clientSecret,
                ]);
            }
        } catch (\Throwable $e) {
            DB::rollBack();

            Log::error('Donation failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment initialization failed.',
            ], 500);
        }
    }

    public function success(Request $request)
    {
        return view('website-template.donation-success');
    }
}
