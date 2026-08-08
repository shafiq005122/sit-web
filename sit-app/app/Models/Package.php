<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'slug', 'package_code', 'description', 'inclusions', 'exclusions',
        'terms_conditions', 'departure_city', 'makkah_nights', 'madinah_nights',
        'total_nights', 'airline', 'hotel_category', 'haram_distance',
        'visa_included', 'direct_flight', 'is_featured', 'sort_order', 'status',
        'visible_b2c', 'visible_b2b', 'publish_at', 'expire_at',
    ];

    protected function casts(): array
    {
        return [
            'visa_included' => 'boolean',
            'direct_flight' => 'boolean',
            'is_featured' => 'boolean',
            'visible_b2c' => 'boolean',
            'visible_b2b' => 'boolean',
            'publish_at' => 'datetime',
            'expire_at' => 'datetime',
        ];
    }

    public function images()
    {
        return $this->hasMany(PackageImage::class);
    }

    public function prices()
    {
        return $this->hasMany(PackagePrice::class);
    }

    public function hotels()
    {
        return $this->hasMany(PackageHotel::class);
    }

    public function services()
    {
        return $this->hasMany(PackageService::class);
    }

    public function departureGroups()
    {
        return $this->hasMany(DepartureGroup::class);
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeB2cVisible($query)
    {
        return $query->where('visible_b2c', true)->where('status', 'published');
    }

    public function scopeB2bVisible($query)
    {
        return $query->where('visible_b2b', true)->where('status', 'published');
    }
}
