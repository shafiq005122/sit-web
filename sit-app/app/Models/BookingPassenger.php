<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class BookingPassenger extends Model
{
    protected $fillable = ["booking_id", "customer_id", "passport_number", "passport_issue_date", "passport_expiry_date", "given_name", "surname", "full_name", "gender", "date_of_birth", "nationality", "cnic", "passenger_type", "family_head", "relationship", "room_type", "room_allocation", "visa_status", "ticket_status", "document_status", "mobile", "emergency_contact", "medical_notes", "mobility_notes", "child_without_bed", "additional_baggage"];

    
    public function booking() { return $this->belongsTo(Booking::class); }
    public function customer() { return $this->belongsTo(Customer::class); }
    public function documents() { return $this->hasMany(PassengerDocument::class); }
}
