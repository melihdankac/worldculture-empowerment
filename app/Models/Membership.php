<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donation_id',
        'stripe_subscription_id',
        'payment_status',
        'membership_status',
        'start_date',
        'end_date',
        'manual_approval',
        'verification_notes',
        'approved_by',
        'approved_at',
    ];

    protected $casts = [
        'manual_approval' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'approved_at' => 'datetime',
    ];

    /* ------------------------- Relationships ------------------------- */

    /**
     * Üyeliğin sahibi (Donor)
     */
    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    /**
     * Üyelik için yapılan ödeme (Donation)
     */
    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    /**
     * Üyelikle ilişkili fatura
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'membership_id');
    }

    /* ------------------------- Query Scopes ------------------------- */

    public function scopeActive($query)
    {
        return $query->where('membership_status', 'active');
    }

    public function scopePendingVerification($query)
    {
        return $query->where('membership_status', 'pending_verification');
    }

    public function scopeRejected($query)
    {
        return $query->where('membership_status', 'rejected');
    }

    /* ------------------------- Helper Methods ------------------------- */

    public function isActive(): bool
    {
        return $this->membership_status === 'active';
    }

    public function isPending(): bool
    {
        return $this->membership_status === 'pending_verification';
    }

    public function markApproved(int $adminId): void
    {
        $this->update([
            'membership_status' => 'active',
            'manual_approval' => true,
            'approved_by' => $adminId,
            'approved_at' => now(),
        ]);
    }

    public function markRejected(?string $notes = null, ?int $adminId = null): void
    {
        $this->update([
            'membership_status' => 'rejected',
            'verification_notes' => $notes,
            'approved_by' => $adminId,
            'approved_at' => now(),
        ]);
    }
}
