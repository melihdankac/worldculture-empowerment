<?php

namespace App\Jobs;

use App\Mail\DonationReceipt;
use App\Models\Donation;
use App\Models\EmailLog;
use App\Models\Invoice;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessOneTimeAfterPayment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $donationID,
        public string $intentID,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $donation = Donation::with('donor')->where(
            'stripe_payment_id',
            $this->intentID
        )->firstOrFail();

        // 🧾 Fatura oluştur
        if ($donation->invoices()->where('status', 'issued')->exists()) {
            Log::info('Invoice already exists for this donation.');
        } else {
            $invoiceAddressId = $donation->donor
                ->invoiceAddresses()
                ->latest()
                ->first()
                ?->id;

            if ($invoiceAddressId) {
                $donation->invoices()->create([
                    'donor_id' => $donation->donor_id,
                    'invoice_address_id' => $invoiceAddressId,
                    'invoice_number' => $this->generateInvoiceNumber(),
                    'status' => 'issued',
                    'issue_date' => now(),
                    'amount' => $donation->amount,
                    'currency' => $donation->currency,
                ]);
                Log::info('Job da One Time Donation Faturası oluşturuldu!');
            } else {
                Log::info('Invoice address not found');
            }
        }

        // 📥 Makbuz gönderildi olarak işaretle
        $donation->update([
            'receipt_sent_at'     => now(),
        ]);

        // 📧 MAIL
        try {
            Mail::to($donation->donor->email)
                ->send(new DonationReceipt($donation));

            Log::info('Job Log Number: 502', [
                'Message: '
                => 'Job kısmında One Time Donation Email gönderildi Tamam! ',
            ]);

            EmailLog::create([
                'donor_id' => $donation->id,
                'donation_id' => $donation->id,
                'to_email' => $donation->id,
                'subject' => $donation->id,
                'body' => $donation->id,
                'status' => $donation->id,
                'error_message' => $donation->id,
            ]);

            Log::channel('daily')->info('✅ Job başarıyla bitti', [
                'job' => self::class,
            ]);
        } catch (\Throwable $th) {
            Log::channel('daily')->error('🔴 Job hata aldı', [
                'job' => self::class,
                'message' => $th->getMessage(),
            ]);

            throw $th; // job failed olsun
        }

        Log::info('Job Log Number: 503', [
            'Message: '
            => 'Job kısmında işlemler bitti! Logları kontrol ederek her şeyin sorunsuz olduğundan emin ol! ',
        ]);

        // 📢 EVENT
        // event(new DonationSucceeded($donation));
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
