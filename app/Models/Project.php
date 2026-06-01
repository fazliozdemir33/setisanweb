<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Project extends Model
{
    use HasSlug;

    protected $fillable = [
        'slug',
        'cover_image',
        'service_id',
        'sector_id',
        'location_tr',
        'location_en',
        'year',
        'status',
        'is_featured',
        'is_active',
        'order_index',
        'title_tr',
        'scope_tr',
        'description_tr',
        'meta_title_tr',
        'meta_desc_tr',
        'title_en',
        'scope_en',
        'description_en',
        'meta_title_en',
        'meta_desc_en',
        'client_tr',
        'client_en',
        'size_tr',
        'size_en',
        'duration_tr',
        'duration_en',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_tr')
            ->saveSlugsTo('slug');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function sector(): BelongsTo
    {
        return $this->belongsTo(ProjectSector::class, 'sector_id');
    }

    public function categories()
    {
        return $this->belongsToMany(ProjectCategory::class, 'project_project_category');
    }

    public function gallery(): HasMany
    {
        return $this->hasMany(ProjectGallery::class)->orderBy('order_index');
    }

    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_tr ?? '';
    }

    public function getLocationAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"location_{$locale}"} ?? $this->location_tr;
    }

    public function getClientAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"client_{$locale}"} ?? $this->client_tr;
    }

    public function getSizeAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"size_{$locale}"} ?? $this->size_tr;
    }

    public function getDurationAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"duration_{$locale}"} ?? $this->duration_tr;
    }

    public function getScopeAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"scope_{$locale}"} ?? $this->scope_tr;
    }

    public function getDescriptionAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"description_{$locale}"} ?? $this->description_tr;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}
