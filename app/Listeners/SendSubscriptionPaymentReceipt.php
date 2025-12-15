<?php

namespace App\Listeners;

use App\Events\SubscriptionPaymentSucceeded;
use App\Jobs\SendSubscriptionPaymentReceiptJob;
use Illuminate\Support\Facades\Log;

class SendSubscriptionPaymentReceipt
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SubscriptionPaymentSucceeded $event): void
    {
        Log::info('SubscriptionPaymentSucceeded event tetiklendi!', [
            'subscription_payment_id' => $event->subscriptionPayment->id,
        ]);
        SendSubscriptionPaymentReceiptJob::dispatch($event->subscriptionPayment);
    }
}
