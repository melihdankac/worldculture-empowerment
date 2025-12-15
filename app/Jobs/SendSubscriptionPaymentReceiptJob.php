<?php

namespace App\Jobs;

use App\Mail\SubscriptionPaymentReceipt;
use App\Models\SubscriptionPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SendSubscriptionPaymentReceiptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public SubscriptionPayment $subscriptionPayment,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->subscriptionPayment->donor->email)
            ->send(new SubscriptionPaymentReceipt($this->subscriptionPayment));

        // $email = $this->subscriptionPayment->donor?->email;

        // if (! $email) return;

        // // Idempotency: aynı invoice için mail zaten gittiyse çık
        // if (
        //     $this->subscriptionPayment
        //     ->where('stripe_invoice_id', $this->subscriptionPayment->stripe_invoice_id)
        //     ->whereNotNull('receipt_sent_at')
        //     ->exists()
        // ) {
        //     return;
        // }

        // Mail::to($email)->send(
        //     new SubscriptionPaymentReceipt(
        //         $this->subscriptionPayment->subscriptionDonation,
        //     )
        // );
    }
}
