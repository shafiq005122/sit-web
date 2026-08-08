<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DocumentRequirement extends Model
{
    protected $fillable = ["entity_type", "document_type", "is_required", "description"];

    
}
