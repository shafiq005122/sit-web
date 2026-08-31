<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CustomerFamilyMember extends Model
{
    protected $fillable = ["customer_id", "name", "relationship", "cnic", "date_of_birth", "gender"];

    
    public function customer() { return $this->belongsTo(Customer::class); }
}
