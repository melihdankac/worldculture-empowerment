<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Donor;
use App\Models\Donation;
use App\Models\InvoiceAddress;
use App\Models\Membership;
use App\Models\SubscriptionDonation;
use Stripe\Stripe;

class DonationController extends Controller
{
    public function donateProcess(Request $request)
    {
        $request->validate([
            'donation_type'          => ['required', 'in:individual,anonymous,company'],
            'recurring_interval'     => ['required', 'in:one_time,month,year,membership'],
            'amount'                 => ['required_if:recurring_interval,one_time,month,year', 'numeric', 'min:1'],
            'first_name'             => ['required', 'string'],
            'last_name'              => ['required', 'string'],
            'email'                  => ['required', 'email'],
            'stripe_payment_method'  => ['required', 'string'],
        ]);

        Log::info('Donate Log Number: 101', [
            'Message' => 'Validation Geçildi! Bağış işlemleri başlıyor.',
        ]);

        /**
         * ------------------------------------------------------------
         * 1️⃣ DB İŞLEMLERİ (KISA ve GÜVENLİ TRANSACTION)
         * ------------------------------------------------------------
         */
        try {
            DB::beginTransaction();

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

            Log::info('Donar Update or Created', [
                'Donor ID' => $donor->id,
            ]);

            $invoiceAddress = null;

            if ($request->wants_invoice) {
                $invoiceAddress = InvoiceAddress::create([
                    'donor_id'      => $donor->id,
                    'street'        => $request->street,
                    'street_number' => $request->street_number,
                    'zip'           => $request->zip,
                    'city'          => $request->city,
                    'country'       => $request->country,
                    'company_name' => $request->donation_type === 'company' ? $request->company_name : null,
                    'is_company'   => $request->donation_type === 'company',
                ]);

                Log::info('Invoice Address Created', [
                    'invoiceAddress' => $invoiceAddress->id,
                ]);
            }

            DB::commit();
        } catch (\Throwable $e) {
            if (DB::transactionLevel() > 0) {
                DB::rollBack();
            }

            Log::error('Donation DB failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Donation initialization failed.',
            ], 500);
        }

        Log::info('Donate Log Number: 102', [
            'Message: ' => 'Donor ve Fatura adresi(Talep Edildiyse) oluşturuldu!',
        ]);

        /**
         * ------------------------------------------------------------
         * 2️⃣ STRIPE İŞLEMLERİ (TRANSACTION YOK)
         * ------------------------------------------------------------
         */
        try {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            if (! $donor->stripe_customer_id) {
                $customer = \Stripe\Customer::create([
                    'email' => $donor->email,
                    'name'  => "{$donor->first_name} {$donor->last_name}",
                ]);

                $donor->update(['stripe_customer_id' => $customer->id]);
                Log::info('New Stripe Customer Created', [
                    'customer ID' => $customer->id,
                ]);
            } else {
                $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
                log::info('Existing Stripe Customer Retrieved', [
                    'customer ID' => $customer->id,
                ]);
            }

            \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
                ->attach(['customer' => $customer->id]);

            \Stripe\Customer::update($customer->id, [
                'invoice_settings' => [
                    'default_payment_method' => $request->stripe_payment_method,
                ],
            ]);

            Log::info('Donate Log Number: 103', [
                'Message: ' => 'Stripe Customer ve Stripe PaymentMethod Tamam!',
            ]);

            $clientSecret = null;
            $invoice = null;

            /**
             * ------------------------------------------------------------
             * ONE-TIME DONATION
             * ------------------------------------------------------------
             */
            if ($request->recurring_interval === 'one_time') {
                Log::info('One Time İşlem Başlatılıyor!');

                $intent = \Stripe\PaymentIntent::create([
                    'amount'        => $request->amount * 100,
                    'currency'      => 'eur',
                    'customer'      => $customer->id,
                    'payment_method' => $request->stripe_payment_method,
                    'confirm'       => false,
                    'metadata'      => [
                        'type'     => 'donation',
                        'donor_id' => $donor->id,
                    ],
                    'description' => 'One-time donation fee',
                ]);

                Log::info('Stripe Payment Intent Created', [
                    'intent ID' => $intent->id,
                ]);

                $donation = Donation::create([
                    'donor_id'              => $donor->id,
                    'donation_type'         => $request->donation_type,
                    'supported_project'     => $request->supported_project,
                    'amount'                => $request->amount,
                    'currency'              => 'EUR',
                    'payment_method'        => $request->stripe_payment_method,
                    'payment_status'        => 'pending',
                    'stripe_payment_id'     => $intent->id,
                    'stripe_customer_id'    => $customer->id,
                    'wants_invoice'         => $request->wants_invoice,
                    'invoice_address_id'    => $invoiceAddress->id ?? null,
                    'message'               => $request->message,
                ]);

                Log::info('Donation Created', [
                    'donation ID' => $donation->id,
                ]);

                $clientSecret = $intent->client_secret;
            }

            /**
             * ------------------------------------------------------------
             * SUBSCRIPTION DONATION (MONTH / YEAR)
             * ------------------------------------------------------------
             */
            if (in_array($request->recurring_interval, ['month', 'year'])) {

                Log::info('Abonelik İşlemi Başlatılıyor!');

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

                Log::info('Stripe Price Created', [
                    'price ID' => $price->id,
                ]);

                $subscription = \Stripe\Subscription::create([
                    'customer' => $customer->id,
                    'expand'   => ['latest_invoice.confirmation_secret'],
                    'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
                    'payment_behavior' => 'default_incomplete',
                    'items' => [['price' => $price->id]],
                    'metadata' => [
                        'type'     => 'donation',
                        'interval' => $request->recurring_interval,
                        'donor_id' => $donor->id,
                        'wants_invoice' => $request->wants_invoice,
                        'invoice_address_id' => $invoiceAddress?->id,
                    ],
                    'description' => $request->recurring_interval === 'year'
                        ? 'Yearly donation subscription'
                        : 'Monthly donation subscription',
                ]);

                Log::info('Stripe subscription Created', [
                    'subscription ID' => $subscription->id,
                ]);

                $subscriptionDonation = SubscriptionDonation::create([
                    'donor_id'               => $donor->id,
                    'supported_project'      => $request->supported_project,
                    'amount'                 => $request->amount,
                    'currency'               => 'EUR',
                    'recurring_interval'     => $request->recurring_interval,
                    'stripe_subscription_id' => $subscription->id,
                    'wants_invoice'          => $request->wants_invoice,
                    'status'                 => 'pending',
                    'started_at'             => now(),
                ]);

                Log::info('Subscription Donation Created', [
                    'subscriptionDonation ID' => $subscriptionDonation->id,
                ]);

                $invoice = $subscription->latest_invoice;
                $clientSecret = $invoice?->confirmation_secret?->client_secret;
            }

            Log::info('Donate Log Number: 104', [
                'Recurring Interval' => $request->recurring_interval,
                'Message: '
                => 'Bağış için Backend İşlemi Bitti ve Fronta dönüş yapıldı! ',
            ]);

            return response()->json([
                'success'        => true,
                'invoice_status' => $invoice->status ?? null,
                'client_secret'  => $clientSecret,
            ]);
        } catch (\Stripe\Exception\CardException $e) {

            return response()->json([
                'success' => false,
                'message' => 'Payment requires additional confirmation.',
                'client_secret' => $e->getError()->payment_intent->client_secret ?? null,
            ], 402);
        } catch (\Throwable $e) {

            Log::error('Stripe failed', [
                'error' => $e->getMessage(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Payment failed.',
            ], 500);
        }
    }

    public function membershipProcess(Request $request)
    {
        $request->validate([
            'first_name'       => ['required', 'string'],
            'last_name'        => ['required', 'string'],
            'email'            => ['required', 'email'],
            'phone'            => ['required', 'string'],
            'street'           => ['required', 'string'],
            'street_number'    => ['required', 'string'],
            'zip'              => ['required', 'string'],
            'city'             => ['required', 'string'],
            'country'          => ['required', 'string'],
            'stripe_payment_method' => ['required', 'string'],
        ]);

        Log::info('Membership Log Number: 201', [
            'Message' => 'Validation Geçildi!',
        ]);

        /**
         * ---------------------------------------------------------
         * 0️⃣ Mevcut üyelik kontrolü (DEĞİŞMEDİ)
         * ---------------------------------------------------------
         */

        // Localde kapalı liveda açık olacak kontrol !!!
        $donor = Donor::where('email', $request->email)->first();

        if ($donor) {
            $membership = $donor->memberships()->latest()->first();

            if ($membership && $message = $membership->blocksNewApplication()) {
                return response()->json([
                    'success' => false,
                    'message' => $message,
                ], 422);
            }
        }

        Log::info('Membership Log Number: 202', [
            'Message: ' => 'İşlem yapan Donor için devam eden herhangi bir üyelik işlemi yok!',
        ]);

        /**
         * ---------------------------------------------------------
         * 1️⃣ DB İŞLEMLERİ (KISA TRANSACTION)
         * ---------------------------------------------------------
         */
        DB::beginTransaction();

        try {
            // Frontta tek satır kullanmak istersem
            // $addressSingleLine = preg_replace("/\r\n|\r|\n/", ', ', $donor->address);
            $address = trim(sprintf(
                "%s No: %s\n%s %s\n%s",
                $request->street,
                $request->street_number,
                $request->zip,
                $request->city,
                $request->country
            ));

            $donor = Donor::updateOrCreate(
                ['email' => $request->email],
                [
                    'first_name' => $request->first_name,
                    'last_name'  => $request->last_name,
                    'email'      => $request->email,
                    'phone'      => $request->phone,
                    'address'    => $address,
                ]
            );
            Log::info('Donar Update or Created', [
                'Donor ID' => $donor->id,
            ]);

            $invoiceAddress = InvoiceAddress::create([
                'donor_id'      => $donor->id,
                'street'        => $request->street,
                'street_number' => $request->street_number,
                'zip'           => $request->zip,
                'city'          => $request->city,
                'country'       => $request->country,
            ]);
            Log::info('Invoice Address Create Tamam!', [
                'invoice Address ID' => $invoiceAddress->id,
            ]);

            $membership = Membership::create([
                'donor_id'          => $donor->id,
                'membership_status' => 'pending',
            ]);

            Log::info('Membership Create Tamam!', [
                'Membership ID' => $membership->id,
            ]);

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }

        Log::info('Membership Log Number: 203', [
            'Message: ' => 'Üyelik işlemi için Donor, Invoice Address ve Membership Create',
        ]);

        /**
         * ---------------------------------------------------------
         * 2️⃣ STRIPE İŞLEMLERİ (TRANSACTION YOK)
         * ---------------------------------------------------------
         */
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        if (! $donor->stripe_customer_id) {
            $customer = \Stripe\Customer::create([
                'email' => $donor->email,
                'name'  => "{$donor->first_name} {$donor->last_name}",
            ]);

            $donor->update(['stripe_customer_id' => $customer->id]);
        } else {
            $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
        }

        \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
            ->attach(['customer' => $customer->id]);

        \Stripe\Customer::update($customer->id, [
            'invoice_settings' => [
                'default_payment_method' => $request->stripe_payment_method,
            ],
        ]);

        Log::info('Membership Log Number: 204', [
            'Message: ' => 'stripe customer & stripe payment method create & update',
        ]);

        /**
         * ---------------------------------------------------------
         * 120€ YILLIK + 30€ TEK SEFERLİK
         * ---------------------------------------------------------
         */
        // $stripe = new \Stripe\StripeClient(config('services.stripe.secret'));

        $intent = \Stripe\PaymentIntent::create([
            'amount'        => 150 * 100,
            'currency'      => 'eur',
            'customer'      => $customer->id,
            'payment_method' => $request->stripe_payment_method,
            'confirm'       => false,
            'metadata' => [
                'type_detail' => 'subscription_fee',
                'type' => 'membership',
                'interval' => 'one_time',
                'donor_id' => $donor->id,
                'membership_id' => $membership->id,
                'invoice_address' => $invoiceAddress->id,
            ],
            'description' => 'Annual Membership Fee of the Association',
        ]);

        Log::info('Membership Log Number: 205', [
            'Message: ' => 'stripe Payment Intent create!',
        ]);

        $clientSecret = $intent->client_secret;

        /**
         * ---------------------------------------------------------
         * 3️⃣ DB UPDATE (KISA)
         * ---------------------------------------------------------
         */
        $membership->update([
            'stripe_subscription_id' => $intent->id,
            // 'stripe_subscription_id' => $subscription->id,
        ]);
        Log::info('membership Update!');

        Log::info('Membership Log Number: 206', [
            'Message: ' => 'clientSecret & Payment intent Created! Donation Controller Tamam!!!',
        ]);

        session()->flash('member_name', $request->first_name);
        return response()->json([
            'success'        => true,
            'invoice_status' => $invoice->status ?? null,
            'client_secret'  => $clientSecret,
        ]);
    }

    public function success(Request $request)
    {
        return view('website-template.donation-success');
    }

    public function membershipSuccess(Request $request)
    {
        return view('website-template.membership-success');
    }
}

    // Eski transaction sorunu olan
    // public function donateProcess(Request $request)
    // {
    //     $request->validate([
    //         'donation_type'       => ['required', 'in:individual,anonymous,company'],
    //         'recurring_interval' => ['required', 'in:one_time,month,year,membership'],
    //         'amount'              => ['required_if:recurring_interval,one_time,month,year', 'numeric', 'min:1'],
    //         'first_name'          => ['required', 'string'],
    //         'last_name'           => ['required', 'string'],
    //         'email'               => ['required', 'email'],
    //         'stripe_payment_method' => ['required', 'string'],
    //     ]);

    //     DB::beginTransaction();

    //     try {
    //         \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    //         /**
    //          * DONOR
    //          */
    //         $donor = Donor::updateOrCreate(
    //             ['email' => $request->email],
    //             [
    //                 'first_name'   => $request->first_name,
    //                 'last_name'    => $request->last_name,
    //                 'phone'        => $request->phone,
    //                 'company_name' => $request->donation_type === 'company' ? $request->company_name : null,
    //                 'is_company'   => $request->donation_type === 'company',
    //             ]
    //         );

    //         /**
    //          * STRIPE CUSTOMER
    //          */
    //         if (! $donor->stripe_customer_id) {
    //             $customer = \Stripe\Customer::create([
    //                 'email' => $donor->email,
    //                 'name'  => "{$donor->first_name} {$donor->last_name}",
    //             ]);

    //             $donor->update(['stripe_customer_id' => $customer->id]);
    //         } else {
    //             $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
    //         }

    //         /**
    //          * PAYMENT METHOD
    //          */
    //         \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
    //             ->attach(['customer' => $customer->id]);

    //         \Stripe\Customer::update($customer->id, [
    //             'invoice_settings' => [
    //                 'default_payment_method' => $request->stripe_payment_method,
    //             ],
    //         ]);

    //         $clientSecret = null;
    //         $invoiceAddress = null;

    //         /**
    //          * Invoice Address
    //          */
    //         if ($request->wants_invoice) {
    //             $invoiceAddress = InvoiceAddress::create([
    //                 'donor_id'      => $donor->id,
    //                 'street'        => $request->street,
    //                 'street_number' => $request->street_number,
    //                 'zip'           => $request->zip,
    //                 'city'          => $request->city,
    //                 'country'       => $request->country,
    //             ]);
    //         }

    //         /**
    //          * ONE-TIME DONATION
    //          */
    //         if ($request->recurring_interval === 'one_time') {

    //             $intent = \Stripe\PaymentIntent::create([
    //                 'amount'   => $request->amount * 100,
    //                 'currency' => 'eur',
    //                 'customer' => $customer->id,
    //                 'payment_method' => $request->stripe_payment_method,
    //                 'confirm'  => false,
    //                 'metadata' => [
    //                     'type'     => 'donation',
    //                     'donor_id' => $donor->id,
    //                 ],
    //             ]);

    //             Donation::create([
    //                 'donor_id' => $donor->id,
    //                 'donation_type' => $request->donation_type,
    //                 'supported_project'   => $request->supported_project,
    //                 'amount'   => $request->amount,
    //                 'currency' => 'EUR',
    //                 'payment_method' => $request->stripe_payment_method,
    //                 'payment_status' => 'pending',
    //                 'stripe_payment_id' => $intent->id,
    //                 'stripe_customer_id' => $customer->id,
    //                 'wants_invoice' => $request->wants_invoice,
    //                 'invoice_address_id'    => $invoiceAddress->id ?? null,
    //                 'message' => $request->message,
    //             ]);

    //             $clientSecret = $intent->client_secret;
    //         }

    //         /**
    //          * Subscription DONATION (Month - Year)
    //          */
    //         if (in_array($request->recurring_interval, ['month', 'year'])) {

    //             // 1. Price oluştur
    //             $price = \Stripe\Price::create([
    //                 'unit_amount' => $request->amount * 100,
    //                 'currency'    => 'eur',
    //                 'recurring'   => [
    //                     'interval' => $request->recurring_interval,
    //                 ],
    //                 'product_data' => [
    //                     'name' => 'Recurring Donation',
    //                 ],
    //             ]);

    //             $description = $request->recurring_interval === 'year' ?
    //                 'Yearly donation subscription' :
    //                 'Monthly donation subscription';


    //             // 2. Subscription oluştur
    //             $subscription = \Stripe\Subscription::create([
    //                 'customer' => $customer->id,
    //                 'expand' => ['latest_invoice.payment_intent'],
    //                 'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
    //                 'payment_behavior' => 'error_if_incomplete',
    //                 'items' => [['price' => $price->id]],
    //                 'metadata' => [
    //                     'type'     => 'donation',
    //                     'interval' => $request->recurring_interval,
    //                     'donor_id' => $donor->id,
    //                     'wants_invoice' => $request->wants_invoice,
    //                 ],
    //                 'description' => $description,
    //             ]);

    //             // Subscription Donation oluştur
    //             SubscriptionDonation::create([
    //                 'donor_id'               => $donor->id,
    //                 'supported_project'      => $request->supported_project,
    //                 'amount'                 => $request->amount,
    //                 'currency'               => 'EUR',
    //                 'recurring_interval'     => $request->recurring_interval,
    //                 'stripe_subscription_id' => $subscription->id,
    //                 'wants_invoice'          => $request->wants_invoice,
    //                 'status'                 => 'active',
    //                 'started_at'             => now(),
    //             ]);

    //             $invoice = $subscription->latest_invoice;
    //             $paymentIntent = $invoice->payment_intent ?? null;

    //             $clientSecret = $paymentIntent && is_object($paymentIntent)
    //                 ? $paymentIntent->client_secret
    //                 : null;
    //         }

    //         DB::commit();

    //         if ($request->recurring_interval === 'one_time') {
    //             return response()->json([
    //                 'success' => true,
    //                 'client_secret' => $clientSecret,
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'success' => true,
    //                 'invoice_status' =>  $invoice->status,
    //                 'subscription_status' =>  $subscription->status,
    //                 'client_secret' => $clientSecret,
    //             ]);
    //         }
    //     } catch (\Throwable $e) {
    //         DB::rollBack();

    //         Log::error('Donation failed', [
    //             'error' => $e->getMessage(),
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment initialization failed.',
    //         ], 500);
    //     }
    // }


      // Eski transaction sorunu olan
    // public function membershipProcess(Request $request)
    // {
    //     $request->validate([
    //         'first_name'       => ['required', 'string'],
    //         'last_name'        => ['required', 'string'],
    //         'email'            => ['required', 'email'],
    //         'phone'            => ['required', 'string'],

    //         'street'           => ['required', 'string'],
    //         'street_number'    => ['required', 'string'],
    //         'zip'              => ['required', 'string'],
    //         'city'             => ['required', 'string'],
    //         'country'          => ['required', 'string'],
    //     ]);

    //     $donor = Donor::where('email', $request->email)->first();

    //     if ($donor) {
    //         $membership = $donor->memberships()
    //             ->latest('created_at')
    //             ->first();

    //         if ($membership && $message = $membership->blocksNewApplication()) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => $message,
    //             ], 422);
    //         }
    //     }

    //     DB::beginTransaction();

    //     try {
    //         \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    //         /**
    //          * DONOR
    //          */
    //         $address = trim(sprintf(
    //             "%s No: %s\n%s %s\n%s",
    //             $request->street,
    //             $request->house_number,
    //             $request->zip,
    //             $request->city,
    //             $request->country
    //         ));

    //         // Frontta tek satır kullanmak istersem
    //         // $addressSingleLine = preg_replace("/\r\n|\r|\n/", ', ', $donor->address);

    //         $donor = Donor::updateOrCreate(
    //             ['email' => $request->email],
    //             [
    //                 'first_name'   => $request->first_name,
    //                 'last_name'    => $request->last_name,
    //                 'email'        => $request->email,
    //                 'phone'        => $request->phone,
    //                 'address'      => $address,
    //             ]
    //         );

    //         /**
    //          * STRIPE CUSTOMER
    //          */
    //         if (! $donor->stripe_customer_id) {
    //             $customer = \Stripe\Customer::create([
    //                 'email' => $donor->email,
    //                 'name'  => "{$donor->first_name} {$donor->last_name}",
    //             ]);

    //             $donor->update(['stripe_customer_id' => $customer->id]);
    //         } else {
    //             $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
    //         }

    //         /**
    //          * PAYMENT METHOD
    //          */
    //         \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
    //             ->attach(['customer' => $customer->id]);

    //         \Stripe\Customer::update($customer->id, [
    //             'invoice_settings' => [
    //                 'default_payment_method' => $request->stripe_payment_method,
    //             ],
    //         ]);

    //         $clientSecret = null;

    //         /**
    //          * MEMBERSHIP – FIXED 120 €
    //          */
    //         $membership = Membership::create([
    //             'donor_id' => $donor->id,
    //             'membership_status' => 'pending',
    //             'start_date'        => null,
    //             'end_date'          => null,
    //         ]);

    //         // 120€ Yıllık + 30€ Tek seferlik
    //         \Stripe\InvoiceItem::create([
    //             'customer' => $customer->id,
    //             'price_data' => [
    //                 'currency' => 'eur',
    //                 'product' => 'prod_TcW8y8IJJzlEzA',
    //                 'unit_amount' => 3000,
    //             ], // 30 €
    //             'metadata' => [
    //                 'type' => 'membership',
    //                 'interval' => 'year',
    //                 'membership_id' => (string) $membership->id,
    //             ],
    //             'description' => 'Association Membership Entrance Fee',
    //         ]);

    //         // 4000 0025 0000 3155
    //         $subscription = \Stripe\Subscription::create([
    //             'customer' => $customer->id,
    //             'expand' => ['latest_invoice.payment_intent'],
    //             'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
    //             'payment_behavior' => 'error_if_incomplete',
    //             'items' => [['price' => config('services.stripe.prices.membership_year')],],
    //             'metadata' => [
    //                 'type' => 'membership',
    //                 'interval' => 'year',
    //                 'membership_id' => (string) $membership->id,
    //             ],
    //             'description' => 'Annual Membership Fee of the Association',
    //         ]);

    //         // 3. Stripe subscription ID’yi Membership kaydına yaz
    //         $membership->update([
    //             'stripe_subscription_id' => $subscription->id,
    //         ]);

    //         // 4. İlk ödeme için client_secret döndür (frontend için)
    //         $invoice        = $subscription->latest_invoice;
    //         $paymentIntent  = $invoice->payment_intent ?? null;
    //         $clientSecret   = $paymentIntent && is_object($paymentIntent)
    //             ? $paymentIntent->client_secret
    //             : null;

    //         DB::commit();

    //         session()->flash('member_name', $request->first_name);
    //         return response()->json([
    //             'success' => true,
    //             'invoice_status' =>  $invoice->status,
    //             'client_secret' => $clientSecret,
    //         ]);
    //     } catch (\Throwable $e) {
    //         DB::rollBack();

    //         Log::error('Donation failed', [
    //             'error' => $e->getMessage(),
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment initialization failed.',
    //         ], 500);
    //     }

    //     return view('website-template.membership-success');
    // }



    // Bu da diğeri denenemedim
        // public function donateProcess(Request $request)
    // {
    //     $request->validate([
    //         'donation_type'          => ['required', 'in:individual,anonymous,company'],
    //         'recurring_interval'    => ['required', 'in:one_time,month,year,membership'],
    //         'amount'                => ['required_if:recurring_interval,one_time,month,year', 'numeric', 'min:1'],
    //         'first_name'            => ['required', 'string'],
    //         'last_name'             => ['required', 'string'],
    //         'email'                 => ['required', 'email'],
    //         'stripe_payment_method' => ['required', 'string'],
    //     ]);

    //     /**
    //      * ------------------------------------------------------------------
    //      * 1️⃣ DB İŞLEMLERİ (KISA TRANSACTION)
    //      * ------------------------------------------------------------------
    //      */
    //     DB::beginTransaction();

    //     try {
    //         $donor = Donor::updateOrCreate(
    //             ['email' => $request->email],
    //             [
    //                 'first_name'   => $request->first_name,
    //                 'last_name'    => $request->last_name,
    //                 'phone'        => $request->phone,
    //                 'company_name' => $request->donation_type === 'company' ? $request->company_name : null,
    //                 'is_company'   => $request->donation_type === 'company',
    //             ]
    //         );

    //         $invoiceAddress = null;

    //         if ($request->wants_invoice) {
    //             $invoiceAddress = InvoiceAddress::create([
    //                 'donor_id'      => $donor->id,
    //                 'street'        => $request->street,
    //                 'street_number' => $request->street_number,
    //                 'zip'           => $request->zip,
    //                 'city'          => $request->city,
    //                 'country'       => $request->country,
    //             ]);
    //         }

    //         DB::commit();
    //     } catch (\Throwable $e) {
    //         // DB::rollBack();

    //         Log::error('Donation failed', [
    //             'error' => $e->getMessage(),
    //         ]);

    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Payment initialization failed.',
    //         ], 500);
    //         throw $e;
    //     }

    //     /**
    //      * ------------------------------------------------------------------
    //      * 2️⃣ STRIPE İŞLEMLERİ (TRANSACTION YOK)
    //      * ------------------------------------------------------------------
    //      */
    //     \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

    //     if (! $donor->stripe_customer_id) {
    //         $customer = \Stripe\Customer::create([
    //             'email' => $donor->email,
    //             'name'  => "{$donor->first_name} {$donor->last_name}",
    //         ]);

    //         $donor->update(['stripe_customer_id' => $customer->id]);
    //     } else {
    //         $customer = \Stripe\Customer::retrieve($donor->stripe_customer_id);
    //     }

    //     \Stripe\PaymentMethod::retrieve($request->stripe_payment_method)
    //         ->attach(['customer' => $customer->id]);

    //     \Stripe\Customer::update($customer->id, [
    //         'invoice_settings' => [
    //             'default_payment_method' => $request->stripe_payment_method,
    //         ],
    //     ]);

    //     $clientSecret = null;
    //     $invoice = null;

    //     /**
    //      * ------------------------------------------------------------------
    //      * ONE-TIME DONATION
    //      * ------------------------------------------------------------------
    //      */
    //     if ($request->recurring_interval === 'one_time') {

    //         $intent = \Stripe\PaymentIntent::create([
    //             'amount'   => $request->amount * 100,
    //             'currency' => 'eur',
    //             'customer' => $customer->id,
    //             'payment_method' => $request->stripe_payment_method,
    //             'confirm'  => false,
    //             'metadata' => [
    //                 'type'     => 'donation',
    //                 'donor_id' => $donor->id,
    //             ],
    //         ]);

    //         Donation::create([
    //             'donor_id'              => $donor->id,
    //             'donation_type'         => $request->donation_type,
    //             'supported_project'     => $request->supported_project,
    //             'amount'                => $request->amount,
    //             'currency'              => 'EUR',
    //             'payment_method'        => $request->stripe_payment_method,
    //             'payment_status'        => 'pending',
    //             'stripe_payment_id'     => $intent->id,
    //             'stripe_customer_id'    => $customer->id,
    //             'wants_invoice'         => $request->wants_invoice,
    //             'invoice_address_id'    => $invoiceAddress->id ?? null,
    //             'message'               => $request->message,
    //         ]);

    //         $clientSecret = $intent->client_secret;
    //     }

    //     /**
    //      * ------------------------------------------------------------------
    //      * SUBSCRIPTION DONATION (MONTH / YEAR)
    //      * ------------------------------------------------------------------
    //      */
    //     if (in_array($request->recurring_interval, ['month', 'year'])) {

    //         $price = \Stripe\Price::create([
    //             'unit_amount' => $request->amount * 100,
    //             'currency'    => 'eur',
    //             'recurring'   => [
    //                 'interval' => $request->recurring_interval,
    //             ],
    //             'product_data' => [
    //                 'name' => 'Recurring Donation',
    //             ],
    //         ]);

    //         $description = $request->recurring_interval === 'year' ?
    //             'Yearly donation subscription' :
    //             'Monthly donation subscription';

    //         $subscription = \Stripe\Subscription::create([
    //             'customer' => $customer->id,
    //             'expand'   => ['latest_invoice.payment_intent'],
    //             'payment_settings' => ['save_default_payment_method' => 'on_subscription'],
    //             'payment_behavior' => 'error_if_incomplete',
    //             'items' => [['price' => $price->id]],
    //             'metadata' => [
    //                 'type'     => 'donation',
    //                 'interval' => $request->recurring_interval,
    //                 'donor_id' => $donor->id,
    //                 'wants_invoice' => $request->wants_invoice,
    //             ],
    //             'description' => $description,
    //         ]);

    //         SubscriptionDonation::create([
    //             'donor_id'               => $donor->id,
    //             'supported_project'      => $request->supported_project,
    //             'amount'                 => $request->amount,
    //             'currency'               => 'EUR',
    //             'recurring_interval'     => $request->recurring_interval,
    //             'stripe_subscription_id' => $subscription->id,
    //             'wants_invoice'          => $request->wants_invoice,
    //             'status'                 => 'pending',
    //             'started_at'             => now(),
    //         ]);

    //         $invoice = $subscription->latest_invoice;
    //         $paymentIntent = $invoice->payment_intent ?? null;

    //         $clientSecret = $paymentIntent && is_object($paymentIntent)
    //             ? $paymentIntent->client_secret
    //             : null;
    //     }

    //     /**
    //      * ------------------------------------------------------------------
    //      * RESPONSE
    //      * ------------------------------------------------------------------
    //      */
    //     return response()->json([
    //         'success'        => true,
    //         'invoice_status' => $invoice->status ?? null,
    //         'client_secret'  => $clientSecret,
    //     ]);
    // }