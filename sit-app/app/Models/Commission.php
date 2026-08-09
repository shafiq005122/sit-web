<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Commission extends Model
{
    protected $fillable = ["agency_id", "booking_id", "currency", "amount", "commission_type", "rate", "status"];

    
    public function agency() { return $this->belongsTo(Agency::class); }
    public function booking() { return $this->belongsTo(Booking::class); }
}
