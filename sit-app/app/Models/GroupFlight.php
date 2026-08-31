<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GroupFlight extends Model
{
    protected $fillable = ["departure_group_id", "direction", "airline", "flight_number", "flight_date", "departure_airport", "arrival_airport", "departure_time", "arrival_time"];

    
    public function departureGroup() { return $this->belongsTo(DepartureGroup::class); }
}
