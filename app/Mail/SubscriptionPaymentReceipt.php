<?php

namespace App\Mail;

use App\Models\SubscriptionDonation;
use Illuminate\Bus\Queueable;
use App\Models\SubscriptionPayment;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubscriptionPaymentReceipt extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public SubscriptionDonation $subscriptionDonation,
    ) {
        //
    }

    public function build()
    {

        // Aylık/Yıllık Bağış Makbuzu
        return $this->subject('Monatliche/Jährliche Spendenquittung')
            ->view('emails.subscription-payment-receipt')
            ->with('subscriptionDonation', $this->subscriptionDonation);
    }

    // /**
    //  * Get the message envelope.
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Subscription Payment Receipt',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
