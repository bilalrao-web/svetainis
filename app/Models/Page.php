<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug', 'title', 'title_translations', 'content', 'content_translations',
        'meta_description', 'meta_description_translations', 'meta_keywords', 'meta_keywords_translations', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'title_translations' => 'array',
        'content_translations' => 'array',
        'meta_description_translations' => 'array',
        'meta_keywords_translations' => 'array',
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
     * Get the translated content based on current locale
     */
    public function getTranslatedContentAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->content_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->content;
    }

    /**
     * Get the translated meta_description based on current locale
     */
    public function getTranslatedMetaDescriptionAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->meta_description_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->meta_description;
    }

    /**
     * Get the translated meta_keywords based on current locale
     */
    public function getTranslatedMetaKeywordsAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->meta_keywords_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->meta_keywords;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
