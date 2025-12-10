<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'donation_id',
        'membership_id',
        'invoice_addresses_id',
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

    // İlişkiler
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

    public function invoiceAddress()
    {
        return $this->belongsTo(InvoiceAddress::class);
    }
}
