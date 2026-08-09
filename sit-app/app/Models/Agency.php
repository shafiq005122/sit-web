<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agency extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'agency_name', 'owner_name', 'contact_person', 'email', 'mobile', 'whatsapp',
        'office_address', 'city', 'country', 'company_reg_no', 'travel_licence',
        'tax_info', 'cnic', 'bank_details', 'tier_id', 'branch_id', 'status',
        'approved_at', 'rejected_at',
    ];

    protected function casts(): array
    {
        return [
            'approved_at' => 'datetime',
            'rejected_at' => 'datetime',
        ];
    }

    public function tier()
    {
        return $this->belongsTo(AgentTier::class, 'tier_id');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function documents()
    {
        return $this->hasMany(AgencyDocument::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function wallet()
    {
        return $this->hasOne(AgentWallet::class);
    }
}
