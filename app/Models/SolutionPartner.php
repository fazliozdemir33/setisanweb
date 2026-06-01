<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionPartner extends Model
{
    protected $fillable = ['name', 'logo', 'website', 'order_index', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
