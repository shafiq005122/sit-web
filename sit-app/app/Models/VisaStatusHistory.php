<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class VisaStatusHistory extends Model
{
    protected $fillable = ["visa_application_id", "status", "changed_by", "notes"];

    
    public function visaApplication() { return $this->belongsTo(VisaApplication::class); }
}
