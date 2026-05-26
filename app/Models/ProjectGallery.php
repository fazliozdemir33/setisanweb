<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectGallery extends Model
{
    protected $table = 'project_gallery';

    protected $fillable = [
        'project_id', 'image_path', 'alt_tr', 'alt_en', 'order_index',
    ];

    public function getAltAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"alt_{$locale}"} ?? $this->alt_tr;
    }
}
