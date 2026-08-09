<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class GroupInventory extends Model
{
    protected $fillable = ["departure_group_id", "room_type_id", "total_seats", "available_seats", "held_seats", "confirmed_seats"];

    
    public function departureGroup() { return $this->belongsTo(DepartureGroup::class); }
    public function roomType() { return $this->belongsTo(RoomType::class); }
}
