<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class AgencyDocument extends Model
{
    protected $fillable = ["agency_id", "type", "file_path", "original_name"];

    
    public function agency() { return $this->belongsTo(Agency::class); }
}
