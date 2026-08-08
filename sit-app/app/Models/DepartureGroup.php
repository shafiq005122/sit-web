<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DepartureGroup extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'group_code', 'package_id', 'departure_city', 'departure_date', 'return_date',
        'airline', 'flight_number', 'return_flight_number', 'makkah_hotel', 'madinah_hotel',
        'makkah_nights', 'madinah_nights', 'total_nights', 'total_seats', 'available_seats',
        'held_seats', 'confirmed_seats', 'cancelled_seats', 'booking_deadline', 'visa_deadline',
        'group_leader', 'notes', 'status',
    ];

    protected function casts(): array
    {
        return [
            'departure_date' => 'date',
            'return_date' => 'date',
            'booking_deadline' => 'date',
            'visa_deadline' => 'date',
        ];
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function inventory()
    {
        return $this->hasMany(GroupInventory::class);
    }

    public function flights()
    {
        return $this->hasMany(GroupFlight::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeOpen($query)
    {
        return $query->whereIn('status', ['open', 'limited']);
    }
}
