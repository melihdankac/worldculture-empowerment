<?php

namespace App\Jobs;

use App\Mail\MembershipPaymentReceipt;
use App\Models\Invoice;
use App\Models\InvoiceAddress;
use App\Models\Membership;
use App\Models\MembershipPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ProcessMembershipAfterPayment implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public int $membershipID,
        public string $intentID,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Job Log Number: 510', [
            'Message: '
            => 'Webhook bitti! Membership Job Başladı! ',
        ]);

        $membership = Membership::with('donor')->where(
            'id',
            $this->membershipID
        )->firstOrFail();

        try {
            $membershipStatus = $membership->membership_status;
            Mail::to($membership->donor->email)->send(
                new MembershipPaymentReceipt($membershipStatus)
            );

            Log::info('Job da Membership Email gönderildi Tamam!');

            $membershipPayment = MembershipPayment::where('membership_id', $membership->id)
                ->where('status', 'paid')
                ->latest()->first();
            $membershipPayment->update([
                'receipt_sent_at' => now(),
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }


        // 🔖 Fatura oluştur
        $membershipPayment = MembershipPayment::where('membership_id', $membership->id)->latest()->first();

        if ($membershipPayment->invoices()->where('status', 'issued')->exists()) {
            Log::info('Invoice already exists for this donation.');
        } else {
            $invoiceAddress = InvoiceAddress::where('donor_id', $membership->donor_id)->latest()->first();

            if ($invoiceAddress) {
                $membershipPayment->invoices()->create([
                    'donor_id'           => $membership->donor_id,
                    'invoice_address_id' => $invoiceAddress->id,
                    'invoice_number'     => $this->generateInvoiceNumber(),
                    'status'             => 'issued',
                    'issue_date'         => now(),
                    'amount'             => $membershipPayment->amount,
                    'currency'           => $membershipPayment->currency,
                ]);

                Log::info('Job da Membership Faturası oluşturuldu!');
            } else {
                Log::info('Invoice address not found');
            }
        }
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
