<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PackageHotel extends Model
{
    protected $fillable = ["package_id", "city", "hotel_name", "category", "distance_from_haram", "nights"];

    
    public function package() { return $this->belongsTo(Package::class); }
}
