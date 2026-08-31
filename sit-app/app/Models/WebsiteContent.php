<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class WebsiteContent extends Model
{
    protected $fillable = ["section", "key", "content", "image_path", "is_active"];

    
}
