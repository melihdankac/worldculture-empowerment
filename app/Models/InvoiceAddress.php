<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InvoiceAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'donor_id',
        'street',
        'street_number',
        'zip',
        'city',
        'country',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    public function formatted()
    {
        return trim("{$this->street} {$this->street_number}, {$this->zip} {$this->city}, {$this->country}");
    }
}
