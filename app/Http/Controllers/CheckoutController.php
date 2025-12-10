<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //Initiates the checkout process and creates a Stripe PaymentIntent.
    public function checkout()
    {

        // Set Stripe secret key from .env
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // Amount in fils. Stripe uses the smallest unit of the currency, so for AED (1 AED = 100 fils), we multiply the desired amount by 100 to convert it to fils.
        $amount = 10 * 100; // Convert 200 AED to fils (1 AED = 100 fils)
        try {
            // Create a new PaymentIntent with Stripe
            $payment_intent = \Stripe\PaymentIntent::create([
                // Payment description
                'description' => 'Code Shotcut Stripe Test Payment',
                // Payment amount in fils
                'amount' => $amount,
                // Currency (AED in this case)
                'currency' => 'aed',
                // Payment method type (card)
                'payment_method_types' => ['card'],
            ]);
            // Get the client secret to authenticate the payment on the frontend
            $intent = $payment_intent->client_secret;
            // Return view with the payment intent client secret
            return view('credit-card', compact('intent'));
        } catch (\Exception $e) {
            // Handle any errors during the payment creation process
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    //Handles the post-payment process.
    public function afterPayment()
    {
        // Display a message confirming the payment was successful
        return 'Payment received. Thank you for using our services.';
    }
}
