<?php

namespace App\Jobs;

use App\Mail\MembershipPaymentReceipt;
use App\Models\Invoice;
use App\Models\Membership;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendMembershipPaymentReceiptJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Membership $membership
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Event->Job Tetiklendi!');

        $email = $this->membership->donor?->email;
        $stripe_invoice_id = $this->membership->payments->stripe_invoice_id;

        if (! $email) return;

        if (
            $this->membership
            ->payments()
            ->where('stripe_invoice_id', $stripe_invoice_id)
            ->whereNotNull('receipt_sent_at')
            ->exists()
        ) {
            return;
        }

        Mail::to($this->membership->donor->email)
            ->send(new MembershipPaymentReceipt($this->membership));
    }
}
