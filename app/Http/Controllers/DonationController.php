<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\Donation;
use App\Models\Donor;
use App\Models\InvoiceAddress;
use App\Models\Membership;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\PaymentIntent;
use Stripe\Subscription;
use Illuminate\Support\Facades\DB;

class DonationController extends Controller
{
    public function process(Request $request)
    {
        $request->validate([
            'donation_type' => ['required', 'in:individual,anonymous,company'],
            'supported_project' => ['nullable', 'string', 'max:255'],
            'recurring_interval' => ['required', 'in:one_time,month,year,membership'],
            'amount' => ['required', 'numeric', 'min:1'],
            'message' => ['nullable', 'string', 'max:1000'],

            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'company_name' => ['required_if:donation_type,company', 'nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],

            'wants_invoice' => ['nullable', 'boolean'],
            'street' => ['required_if:wants_invoice,1', 'nullable', 'string', 'max:255'],
            'street_number' => ['required_if:wants_invoice,1', 'nullable', 'string', 'max:50'],
            'zip' => ['required_if:wants_invoice,1', 'nullable', 'string', 'max:20'],
            'city' => ['required_if:wants_invoice,1', 'nullable', 'string', 'max:100'],
            'country' => ['required_if:wants_invoice,1', 'nullable', 'string', 'max:100'],
        ]);

        DB::beginTransaction();

        try {
            Stripe::setApiKey(config('services.stripe.secret'));

            $donor = Donor::updateOrCreate(
                ['email' => $request->email],
                [
                    'is_company' => $request->donation_type === 'company',
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'company_name' => $request->company_name,
                    'phone' => $request->phone,
                ]
            );

            $customer = $donor->stripe_customer_id
                ? Customer::retrieve($donor->stripe_customer_id)
                : Customer::create([
                    'email' => $donor->email,
                    'name' => $donor->is_company
                        ? $donor->company_name
                        : trim("{$donor->first_name} {$donor->last_name}"),
                    'payment_method' => $request->stripe_payment_method,
                    'invoice_settings' => [
                        'default_payment_method' => $request->stripe_payment_method,
                    ],
                ]);

            if (!$donor->stripe_customer_id) {
                $donor->update(['stripe_customer_id' => $customer->id]);
            }

            $currency = 'eur';
            $amount = $request->recurring_interval === 'membership' ? 120.00 : $request->amount;
            $isRecurring = in_array($request->recurring_interval, ['month', 'year']);
            $paymentStatus = 'pending';
            $stripePaymentId = null;
            $clientSecret = null;
            $subscriptionId = null;

            if ($request->recurring_interval === 'one_time') {
                $paymentIntent = PaymentIntent::create([
                    'amount' => $amount * 100,
                    'currency' => $currency,
                    'customer' => $customer->id,
                    'payment_method' => $request->stripe_payment_method,
                    'confirm' => true,
                    'off_session' => false,
                    'return_url' => route('donation.success'),
                ]);

                $stripePaymentId = $paymentIntent->id;
                $clientSecret = $paymentIntent->client_secret;
            } else {
                // $priceId = null;

                // if ($request->recurring_interval === 'membership') {
                //     $priceId = env('STRIPE_MEMBERSHIP_PRICE_ID');
                // } else {
                //     $price = \Stripe\Price::create([
                //         'currency' => $currency,
                //         'unit_amount' => $amount * 100,
                //         'recurring' => ['interval' => $request->recurring_interval],
                //         'product_data' => [
                //             'name' => 'Recurring Donation (' . ucfirst($request->recurring_interval) . ')',
                //         ],
                //     ]);
                //     $priceId = $price->id;
                // }

                // $subscription = Subscription::create([
                //     'customer' => $customer->id,
                //     'items' => [['price' => $priceId]],
                //     'expand' => ['latest_invoice.payment_intent'],
                // ]);

                // return response()->json([
                //     'success' => true,
                //     'client_secret' => $subscription->latest_invoice->payment_intent->client_secret,
                //     'message' => 'Subscription created successfully.',
                // ]);

                // $subscriptionId = $subscription->id;
                // $stripePaymentId = $subscription->latest_invoice->payment_intent->id ?? null;
                // $clientSecret = $subscription->latest_invoice->payment_intent->client_secret ?? null;

                // Bu baya eskiden bulduğum koddu. Şimdi yukarıdaki gibi yapılıyor. Kontrol edilecek.
                // Plan veya price oluşturulmamışsa manuel amount ile fatura kesilir
                $product = \Stripe\Product::create([
                    'name' => 'Recurring Donation (' . ucfirst($request->recurring_interval) . ')',
                ]);

                $price = \Stripe\Price::create([
                    'unit_amount' => 120 * 100,
                    'currency' => 'eur',
                    'recurring' => ['interval' => 'year'],
                    'product' => $product->id,
                ]);

                $subscription = \Stripe\Subscription::create([
                    'customer' => $customer->id,
                    'items' => [['price' => $price->id]],
                    'expand' => ['latest_invoice.payment_intent'],
                ]);

                return response()->json([
                    'success' => true,
                    'client_secret' => $subscription,
                    'message' => 'Subscription created successfully.',
                ]);

                $paymentIntent = $subscription->latest_invoice->payment_intent;
            }

            if ($request->wants_invoice) {
                $invoice_address = InvoiceAddress::create([
                    'donor_id' => $donor->id,
                    'street' => $request->street,
                    'street_number' => $request->street_number,
                    'zip' => $request->zip,
                    'city' => $request->city,
                    'country' => $request->country,
                    'is_company' => $donor->is_company,
                ]);
            }

            $donation = Donation::create([
                'donor_id' => $donor->id,
                'donation_type' => $request->donation_type,
                'supported_project' => $request->supported_project,
                'amount' => $amount,
                'currency' => $currency,
                'payment_method' => 'card',
                'payment_status' => $paymentStatus,
                'stripe_payment_id' => $stripePaymentId,
                'stripe_customer_id' => $customer->id,
                'recurring_interval' => $request->recurring_interval,
                'is_recurring' => $isRecurring,
                'wants_invoice' => $request->wants_invoice ?? false,
                'invoice_address_id' => $invoice_address->id ?? null,
                'message' => $request->message,
            ]);

            if ($request->recurring_interval === 'membership') {
                Membership::create([
                    'donor_id' => $donor->id,
                    'donation_id' => $donation->id,
                    'stripe_subscription_id' => $subscriptionId,
                    'payment_status' => 'pending',
                    'membership_status' => 'pending_verification',
                    'start_date' => now(),
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'client_secret' => $clientSecret,
                'message' => 'Donation created successfully.',
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Donation failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Donation failed: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function success(Request $request)
    {
        return view('website-template.donation-success');
    }
}
