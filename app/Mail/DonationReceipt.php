<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DonationReceipt extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Donation $donation) {}


    public function build()
    {
        // Tek seferlik bağış makbuzu
        return $this->subject('Spendenquittung für eine einmalige Spende')
            ->view('emails.receipt_html')
            ->with('donation', $this->donation);
    }
}
