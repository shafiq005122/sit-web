<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class SupportTicket extends Model
{
    protected $fillable = ["subject", "user_id", "status", "priority", "description"];

    
    public function user() { return $this->belongsTo(User::class); }
}
