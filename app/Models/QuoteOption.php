<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteOption extends Model
{
    protected $fillable = ['option_group', 'label', 'value', 'sort_order', 'is_active'];

    protected function casts(): array
    {
        return ['is_active' => 'boolean'];
    }
}
