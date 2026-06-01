<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = [
        'slug',
        'name_tr',
        'name_en',
        'is_active',
        'order_index'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_project_category');
    }
}
