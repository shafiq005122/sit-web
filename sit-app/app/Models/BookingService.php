<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BookingService extends Model
{
    protected $fillable = ["booking_id", "name", "price", "is_included"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
}
