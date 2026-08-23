<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TilingService extends Model
{
    protected $fillable = ['title', 'slug', 'category', 'service_type', 'description', 'image_path'];
}
