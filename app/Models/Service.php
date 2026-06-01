<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Service extends Model
{
    use HasSlug;

    protected $fillable = [
        'slug', 'icon', 'cover_image', 'order_index', 'is_active', 'parent_id',
        'title_tr', 'excerpt_tr', 'content_tr', 'meta_title_tr', 'meta_desc_tr',
        'title_en', 'excerpt_en', 'content_en', 'meta_title_en', 'meta_desc_en',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title_tr')
            ->saveSlugsTo('slug');
    }

    /* ── Relationships ── */

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Service::class, 'parent_id')->orderBy('order_index');
    }

    public function activeChildren(): HasMany
    {
        return $this->hasMany(Service::class, 'parent_id')->where('is_active', true)->orderBy('order_index');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /* ── Helpers ── */

    public function isParent(): bool
    {
        return is_null($this->parent_id);
    }

    public function isChild(): bool
    {
        return !is_null($this->parent_id);
    }

    /* ── Localized Accessors ── */

    public function getTitleAttribute(): string
    {
        $locale = app()->getLocale();
        return $this->{"title_{$locale}"} ?? $this->title_tr ?? '';
    }

    public function getExcerptAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"excerpt_{$locale}"} ?? $this->excerpt_tr;
    }

    public function getContentAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"content_{$locale}"} ?? $this->content_tr;
    }

    public function getMetaTitleAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_title_{$locale}"} ?? $this->meta_title_tr;
    }

    public function getMetaDescAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"meta_desc_{$locale}"} ?? $this->meta_desc_tr;
    }

    /* ── Scopes ── */

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('order_index');
    }

    public function scopeParents($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeChildren($query)
    {
        return $query->whereNotNull('parent_id');
    }
}
