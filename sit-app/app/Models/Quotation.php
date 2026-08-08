<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quotation extends Model
{
    protected $fillable = ["quotation_number", "agency_id", "customer_id", "package_id", "departure_group_id", "currency", "total_amount", "status", "valid_until"];

    
    public function agency() { return $this->belongsTo(Agency::class); }
    public function customer() { return $this->belongsTo(Customer::class); }
    public function package() { return $this->belongsTo(Package::class); }
    public function departureGroup() { return $this->belongsTo(DepartureGroup::class); }
    public function items() { return $this->hasMany(QuotationItem::class); }
}
