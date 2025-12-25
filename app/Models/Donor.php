<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Donor extends Model
{
    use HasFactory;

    protected $appends = ['address_single_line'];

    protected $fillable = [
        'first_name',
        'last_name',
        'is_company',
        'company_name',
        'email',
        'phone',
        'address',
        'stripe_customer_id',
    ];

    /**
     * Bağışlar (Donor -> Donations)
     */
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

    /**
     * Üyelik (Donor -> Membership)
     */
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    /**
     * Abonelik (Donor -> subscribe)
     */
    public function subscriptionDonations()
    {
        return $this->hasMany(SubscriptionDonation::class);
    }

    /**
     * Faturalar (Donor -> Invoices)
     */
    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Full Name Accessor
     */
    public function getFullNameAttribute(): string
    {
        if ($this->is_company) {
            return $this->company_name ?? '';
        }

        return trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
    }

    public function invoiceAddresses()
    {
        return $this->hasMany(InvoiceAddress::class);
    }

    public function activeInvoiceAddress()
    {
        return $this->invoiceAddresses()->latest()->first();
    }

    public function getAddressSingleLineAttribute(): string
    {
        return preg_replace("/\r\n|\r|\n/", ', ', $this->address);
    }

    // backend kullanımı
    //     $donor->address;                // Satır sonlu
    // $donor->address_single_line;    // Tek satır
    // front kullanımı
    // {!! nl2br(e($donor->address)) !!}
    // {{ $donor->address_single_line }}



}
