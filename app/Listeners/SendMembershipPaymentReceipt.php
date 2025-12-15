<?php

namespace App\Listeners;

use App\Events\MembershipPaymentSucceeded;
use App\Jobs\SendMembershipPaymentReceiptJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendMembershipPaymentReceipt
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
    public function handle(MembershipPaymentSucceeded $event): void
    {
        Log::info('Event Tetiklendi!');
        SendMembershipPaymentReceiptJob::dispatch($event->membership);
    }
}
