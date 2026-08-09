<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class PackageService extends Model
{
    protected $fillable = ["package_id", "name", "description", "is_included"];

    
    public function package() { return $this->belongsTo(Package::class); }
}
