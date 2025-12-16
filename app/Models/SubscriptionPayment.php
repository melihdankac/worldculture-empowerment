<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubscriptionPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_donation_id',
        'stripe_invoice_id',
        'stripe_payment_id',
        'wants_invoice',
        'amount',
        'currency',
        'status',
        'paid_at',
    ];

    protected $casts = [
        'paid_at' => 'datetime',
    ];

    /**
     * İlişki: hangi aboneliğe ait
     */

    public function subscriptionDonation()
    {
        return $this->belongsTo(SubscriptionDonation::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class); // veya User::class
    }
}
