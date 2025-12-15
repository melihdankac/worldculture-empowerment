<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StripeEvent extends Model
{
    public $timestamps = false;
    protected $fillable = ['stripe_event_id', 'type', 'processed_at'];
}
