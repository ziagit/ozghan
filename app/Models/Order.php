<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'project_type', 'project_location', 'commercial_property_type', 'service', 'address',
        'preferred_date', 'estimated_area', 'materials_provided', 'tile_size', 'name',
        'email', 'phone', 'note', 'photos', 'status',
    ];

    protected function casts(): array
    {
        return [
            'preferred_date' => 'date',
            'estimated_area' => 'decimal:2',
            'materials_provided' => 'boolean',
            'photos' => 'array',
        ];
    }
}
