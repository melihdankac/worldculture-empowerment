<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

use App\Models\Donation;
use App\Mail\DonationReceipt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendDonationReceiptJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Donation $donation)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $email = $this->donation->donor?->email;

        if (! $email) return;

        // Idempotency: aynı donation için mail zaten gönderildiyse çık
        if ($this->donation->receipt_sent_at) {
            return;
        }

        Mail::to($email)->send(
            new DonationReceipt($this->donation)
        );

        $this->donation->update([
            'receipt_sent_at' => now(),
        ]);
    }
}
