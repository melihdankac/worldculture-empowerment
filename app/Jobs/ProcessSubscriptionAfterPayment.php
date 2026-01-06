<?php

namespace App\Jobs;

use App\Models\EmailLog;
use App\Models\Invoice;
use App\Models\SubscriptionDonation;
use App\Models\SubscriptionPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessSubscriptionAfterPayment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $subscriptionDonationID,
        public string $invoiceID,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Buraya Abonelik sonrası işlemler gelecek
        $subscriptionDonation = SubscriptionDonation::with('donor')->findOrFail($this->subscriptionDonationID);
        $subscriptionPayment = SubscriptionPayment::where('subscription_donation_id', $this->subscriptionDonationID)
            ->where('stripe_invoice_id', $this->invoiceID)->firstOrFail();


        // 🧾 Fatura oluştur
        if ($subscriptionPayment->wants_invoice && $subscriptionPayment->invoice_address_id) {
            if ($subscriptionPayment->invoices()->where('status', 'issued')->exists()) {
                Log::info('Invoice already exists for this Subscription Donation.');
            } else {
                $subscriptionPayment->invoices()->create([
                    'donor_id' => $subscriptionDonation->donor_id,
                    'invoice_address_id' => $subscriptionPayment->invoice_address_id,
                    'invoice_number' => $this->generateInvoiceNumber(),
                    'status' => 'issued',
                    'issue_date' => now(),
                    'amount' => $subscriptionPayment->amount,
                    'currency' => $subscriptionPayment->currency,
                ]);
                Log::info('Job da Aylık/yıllık Donation Faturası oluşturuldu!');
            }
        } else {
            Log::info('Invoice address not found for Subscription Donation or donor did not want an invoice.');
        }

        // 📧 MAIL
        try {
            Mail::to($subscriptionDonation->donor->email)->send(
                new \App\Mail\SubscriptionPaymentReceipt($subscriptionDonation)
            );

            Log::info('Job Log Number: 502', [
                'Message: '
                => 'Job kısmında Aylık/Yıllık Donation Email gönderildi Tamam! ',
            ]);

            EmailLog::create([
                'donor_id' => $subscriptionDonation->donor_id,
                'donation_id' => $subscriptionDonation->id,
                'to_email' => $subscriptionDonation->donor->email,
                'subject' => 'Your donation receipt',
                'body' => view('emails.subscription-payment-receipt', compact('subscriptionDonation'))->render(),
                'status' => 'sent',
                'error_message' => null,
            ]);

            Log::channel('daily')->info('✅ Job başarıyla bitti', [
                'job' => self::class,
            ]);
        } catch (\Throwable $th) {
            EmailLog::create([
                'donor_id' => $subscriptionDonation->donor_id,
                'donation_id' => $subscriptionDonation->id,
                'to_email' => $subscriptionDonation->donor->email,
                'subject' => 'Your donation receipt',
                'body' => view('emails.subscription-payment-receipt', compact('subscriptionDonation'))->render(),
                'status' => 'failed',
                'error_message' => $th->getMessage(),
            ]);

            Log::channel('daily')->error('🔴 Job hata aldı', [
                'job' => self::class,
                'message' => $th->getMessage(),
            ]);

            throw $th; // job failed olsun
        }

        Log::info('Job Log Number: 503', [
            'Message: '
            => 'Aylık/Yıllık bağışın job kısmında işlemler bitti! Logları kontrol ederek her şeyin sorunsuz olduğundan emin olabilirsin! ',
        ]);
    }

    /**
     * ---------------------------------------
     * HELPER FUNCTION
     * ---------------------------------------
     */
    protected function generateInvoiceNumber(): string
    {
        // Yıl bilgisini al
        $year = now()->year;

        // O yıl içinde kaçıncı fatura olduğunu bul
        $lastInvoice = Invoice::whereYear('created_at', $year)
            ->orderBy('id', 'desc')
            ->first();

        if ($lastInvoice && $lastInvoice->invoice_number) {
            // Son numarayı al ve artır
            $parts = explode('-', $lastInvoice->invoice_number);
            $lastNumber = intval(end($parts));
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            // İlk fatura → 0001
            $newNumber = '0001';
        }

        return $year . '-' . $newNumber;
    }
}
