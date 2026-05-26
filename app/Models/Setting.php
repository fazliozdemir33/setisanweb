<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value_tr', 'value_en', 'type', 'group'];

    public function getValueAttribute(): ?string
    {
        $locale = app()->getLocale();
        return $this->{"value_{$locale}"} ?? $this->value_tr;
    }

    public static function get(string $key, ?string $default = null): ?string
    {
        $setting = static::where('key', $key)->first();
        return $setting?->value ?? $default;
    }
}
