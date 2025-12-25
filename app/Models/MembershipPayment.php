<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MembershipPayment extends Model
{

    use HasFactory;

    protected $fillable = [
        'membership_id',
        'stripe_subscription_id',
        'stripe_invoice_id',
        'stripe_payment_id',
        'amount',
        'currency',
        'status',
        'paid_at',
        'receipt_sent_at',
    ];

    /**
     * Bağışın faturası (MembershipPayment -> Invoice)
     */
    public function invoices()
    {
        return $this->morphMany(Invoice::class, 'invoiceable');
    }

    // MembershipPayment → Membership
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function donor()
    {
        return $this->membership?->donor;
    }
}
