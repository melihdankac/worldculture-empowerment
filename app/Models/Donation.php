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
        'stripe_invoice_id',
        'wants_invoice',
        'invoice_address_id',
        'message',
        'receipt_sent_at',
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
    // public function invoice()
    // {
    //     return $this->hasOne(Invoice::class);
    // }

    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
}
