<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AgentWallet extends Model
{
    protected $fillable = ["agency_id", "balance", "credit_limit", "used_credit", "outstanding_amount"];

    
    public function agency() { return $this->belongsTo(Agency::class); }
    public function transactions() { return $this->hasMany(WalletTransaction::class); }
}
