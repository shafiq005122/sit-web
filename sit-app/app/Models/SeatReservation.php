<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SeatReservation extends Model
{
    protected $fillable = ["departure_group_id", "booking_id", "agency_id", "quantity", "status", "expires_at"];

    
    public function departureGroup() { return $this->belongsTo(DepartureGroup::class); }
    public function booking() { return $this->belongsTo(Booking::class); }
    public function agency() { return $this->belongsTo(Agency::class); }
}
