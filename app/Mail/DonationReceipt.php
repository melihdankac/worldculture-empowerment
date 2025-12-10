<?php

namespace App\Mail;

use App\Models\Donation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Log;

class DonationReceipt extends Mailable
{
    use Queueable, SerializesModels;

    public $donation;

    /**
     * Create a new message instance.
     */
    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    /**
     * Define the envelope (subject, sender, etc.)
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('melihdankac@gmail.com', 'World Culture Empowerment'),
            subject: 'Your Donation Confirmation'
        );
    }

    /**
     * Define the email content (view, markdown, etc.)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.receipt_html',
            with: [
                'donation' => $this->donation,
            ]
        );
    }

    /**
     * Attachments (PDF receipt)
     */
    public function attachments(): array
    {
        try {
            // PDF oluştur
            $pdf = Pdf::loadView('emails.receipt_pdf', [
                'donation' => $this->donation,
            ]);

            return [
                \Illuminate\Mail\Mailables\Attachment::fromData(fn() => $pdf->output(), 'donation_receipt.pdf')
                    ->withMime('application/pdf'),
            ];
        } catch (\Exception $e) {
            // PDF oluşturulamazsa logla ama mail yine gönderilir
            Log::error('PDF oluşturulamadı: ' . $e->getMessage());
            return [];
        }
    }
}
