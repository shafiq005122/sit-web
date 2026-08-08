<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    protected $fillable = ["payment_reference", "booking_id", "invoice_id", "agency_id", "payment_method", "currency", "amount", "payment_type", "notes", "paid_at"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function invoice() { return $this->belongsTo(Invoice::class); }
    public function agency() { return $this->belongsTo(Agency::class); }
    public function allocations() { return $this->hasMany(PaymentAllocation::class); }
}
