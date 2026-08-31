<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'booking_reference', 'source_channel', 'customer_id', 'agency_id', 'package_id',
        'departure_group_id', 'branch_id', 'room_type', 'pax', 'currency',
        'gross_amount', 'discount_amount', 'tax_amount', 'paid_amount', 'outstanding_amount',
        'status', 'internal_notes',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function departureGroup()
    {
        return $this->belongsTo(DepartureGroup::class);
    }

    public function passengers()
    {
        return $this->hasMany(BookingPassenger::class);
    }

    public function rooms()
    {
        return $this->hasMany(BookingRoom::class);
    }

    public function services()
    {
        return $this->hasMany(BookingService::class);
    }

    public function statusHistory()
    {
        return $this->hasMany(BookingStatusHistory::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    public function visaApplications()
    {
        return $this->hasMany(VisaApplication::class);
    }
}
