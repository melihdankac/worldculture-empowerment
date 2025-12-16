<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'invoiceable',
        'invoice_address_id',
        'invoice_number',
        'status', // pending | issued | canceled
        'issue_date',
        'amount',
        'currency',
        'file_path',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'amount' => 'decimal:2',
    ];

    /**
     * Polymorphic ilişki: invoiceable
     * Donation, MembershipPayment veya SubscriptionDonation olabilir
     */
    public function invoiceable()
    {
        return $this->morphTo();
    }

    /**
     * Donor ilişkisi
     */
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    /**
     * Fatura adresi ilişkisi
     */
    public function address()
    {
        return $this->belongsTo(InvoiceAddress::class, 'invoice_address_id');
    }

    /**
     * Fatura adresi ilişkisi
     */
    // public function donation()
    // {
    //     return $this->belongsTo(Donation::class);
    // }

    // public function membership()
    // {
    //     return $this->belongsTo(Membership::class);
    // }
}
