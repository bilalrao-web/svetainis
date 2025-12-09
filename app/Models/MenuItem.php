<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'label', 'label_translations', 'url', 'route', 'icon', 'order', 'is_active', 'location'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'label_translations' => 'array',
    ];

    /**
     * Get the translated label based on current locale
     */
    public function getTranslatedLabelAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->label_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        // Fallback to default label if translation not available
        return $this->label;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeLocation($query, $location)
    {
        return $query->where('location', $location);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
