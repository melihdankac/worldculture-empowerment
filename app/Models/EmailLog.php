<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donation_id',
        'membership_id',
        'invoice_id',
        'to_email',
        'subject',
        'body',
        'status', // pending | sent | failed
        'error_message',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function donation()
    {
        return $this->belongsTo(Donation::class);
    }

    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
