<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PackagePrice extends Model
{
    protected $fillable = ["package_id", "channel", "currency", "sharing_price", "quad_price", "triple_price", "double_price", "child_with_bed", "child_without_bed", "infant_price", "visa_price", "airline_price", "extra_baggage", "airport_transport", "makkah_transport", "madinah_transport", "ziyarah_price", "meals_price"];

    
    public function package() { return $this->belongsTo(Package::class); }
}
