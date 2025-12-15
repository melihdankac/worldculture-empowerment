<?php

namespace App\Listeners;

use App\Events\DonationSucceeded;
use App\Jobs\SendDonationReceiptJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendDonationReceipt
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
    public function handle(DonationSucceeded $event): void
    {
        Log::info('Event Tetiklendi!');
        SendDonationReceiptJob::dispatch($event->donation);
    }
}
