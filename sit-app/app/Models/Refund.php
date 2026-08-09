<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Refund extends Model
{
    protected $fillable = ["booking_id", "payment_id", "refund_reference", "currency", "amount", "status", "reason"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function payment() { return $this->belongsTo(Payment::class); }
}
