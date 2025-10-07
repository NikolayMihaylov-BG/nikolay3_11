<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $casts = [
        'type' => \App\Enums\Partner::class, // cast enum
    ];

    public function scopeType($query, \App\Enums\Partner $type)
    {
        return $query->where('type', $type);
    }
}
