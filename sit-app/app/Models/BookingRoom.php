<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BookingRoom extends Model
{
    protected $fillable = ["booking_id", "room_type", "quantity", "price_per_person"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
}
