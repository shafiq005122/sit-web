<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class WalletTransaction extends Model
{
    protected $fillable = ["agent_wallet_id", "transaction_type", "amount", "running_balance", "description", "booking_id", "payment_id"];

    
    public function wallet() { return $this->belongsTo(AgentWallet::class); }
    public function booking() { return $this->belongsTo(Booking::class); }
    public function payment() { return $this->belongsTo(Payment::class); }
}
