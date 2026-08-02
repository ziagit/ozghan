<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title', 'slug', 'category', 'description', 'image_path', 'completed_at', 'location', 'area_m2', 'sort_order', 'is_featured', 'is_active'];

    protected function casts(): array
    {
        return ['completed_at' => 'date', 'area_m2' => 'decimal:2', 'is_featured' => 'boolean', 'is_active' => 'boolean'];
    }
}
