<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PassengerDocument extends Model
{
    protected $fillable = ["booking_passenger_id", "type", "file_path", "original_name", "status", "rejection_reason"];

    
    public function passenger() { return $this->belongsTo(BookingPassenger::class, "booking_passenger_id"); }
}
