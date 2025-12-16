<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donation_type',
        'supported_project',
        'amount',
        'currency',
        'payment_method',
        'payment_status',
        'stripe_payment_id',
        'stripe_customer_id',
        'invoice_address_id',
        'wants_invoice',
        'message',
        'receipt_sent_at',
        // bu eksik sadece
        'stripe_invoice_id',
    ];

    /**
     * Bağış yapan kişi (Donation -> Donor)
     */
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    /**
     * Bağışın faturası (Donation -> Invoice)
     */
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
}
