<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class ProjectSector extends Model
{
    use HasSlug;

    protected $fillable = ['name_tr', 'name_en', 'slug', 'order_index'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name_tr')
            ->saveSlugsTo('slug');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'sector_id');
    }

    public function getNameAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"name_{$locale}"} ?? $this->name_tr ?? '';
    }
}
