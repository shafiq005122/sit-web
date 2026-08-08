<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class InternalNote extends Model
{
    protected $fillable = ["entity_type", "entity_id", "user_id", "note"];

    
    public function user() { return $this->belongsTo(User::class); }
}
