<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BookingStatusHistory extends Model
{
    protected $fillable = ["booking_id", "status", "changed_by", "notes"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function changedBy() { return $this->belongsTo(User::class, "changed_by"); }
}
