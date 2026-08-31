<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VisaApplication extends Model
{
    protected $fillable = ["booking_id", "booking_passenger_id", "application_number", "reference", "status", "submission_date", "approval_date", "issued_visa_path", "notes"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function passenger() { return $this->belongsTo(BookingPassenger::class, "booking_passenger_id"); }
    public function statusHistory() { return $this->hasMany(VisaStatusHistory::class); }
}
