<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'title', 'title_translations', 'description', 'description_translations',
        'intro', 'intro_translations', 'note', 'note_translations', 'closing', 'closing_translations',
        'image', 'services_list', 'why_choose', 'benefits', 'service_details',
        'portfolio_project', 'order', 'is_active'
    ];

    protected $casts = [
        'services_list' => 'array',
        'why_choose' => 'array',
        'benefits' => 'array',
        'service_details' => 'array',
        'is_active' => 'boolean',
        'title_translations' => 'array',
        'description_translations' => 'array',
        'intro_translations' => 'array',
        'note_translations' => 'array',
        'closing_translations' => 'array',
    ];

    /**
     * Get the translated title based on current locale
     */
    public function getTranslatedTitleAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->title_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->title;
    }

    /**
     * Get the translated description based on current locale
     */
    public function getTranslatedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->description_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->description;
    }

    /**
     * Get the translated intro based on current locale
     */
    public function getTranslatedIntroAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->intro_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->intro;
    }

    /**
     * Get the translated closing based on current locale
     */
    public function getTranslatedClosingAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->closing_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->closing;
    }

    /**
     * Get the translated note based on current locale
     */
    public function getTranslatedNoteAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->note_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->note;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
