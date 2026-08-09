<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AgentPriceRule extends Model
{
    protected $fillable = ["agency_id", "tier_id", "package_id", "departure_group_id", "rule_type", "currency", "base_price", "commission_percent", "commission_fixed", "markup_percent", "max_markup_percent", "min_selling_price", "credit_eligible", "effective_date", "expiry_date"];

    
    public function agency() { return $this->belongsTo(Agency::class); }
    public function tier() { return $this->belongsTo(AgentTier::class); }
    public function package() { return $this->belongsTo(Package::class); }
    public function departureGroup() { return $this->belongsTo(DepartureGroup::class); }
}
