<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TilingService extends Model
{
    protected $fillable = ['title', 'slug', 'category', 'description', 'image_path', 'sort_order', 'is_active'];
}
