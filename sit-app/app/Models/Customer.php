<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'agency_id', 'name', 'email', 'mobile', 'cnic', 'city', 'country',
        'address', 'source_channel', 'is_vip', 'is_blacklisted', 'risk_notes', 'tags',
    ];

    protected function casts(): array
    {
        return [
            'is_vip' => 'boolean',
            'is_blacklisted' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function agency()
    {
        return $this->belongsTo(Agency::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(CustomerFamilyMember::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
