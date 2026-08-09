<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentTier extends Model
{
    protected $fillable = [
        'name', 'code', 'default_commission_percent', 'default_markup_percent',
        'max_markup_percent', 'min_selling_price', 'credit_limit', 'is_active',
    ];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }

    public function agencies()
    {
        return $this->hasMany(Agency::class, 'tier_id');
    }
}
