<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'slug', 'title', 'title_translations', 'category', 'category_translations', 
        'service_slug', 'description', 'description_translations', 'image',
        'technologies', 'technologies_translations', 'web_type', 'web_type_translations', 
        'use_cases', 'use_cases_translations', 'challenge', 'challenge_translations', 
        'solution', 'solution_translations', 'results', 'results_translations', 
        'features', 'features_translations', 'client', 'duration', 'team_size', 'order', 'is_active'
    ];

    protected $casts = [
        'technologies' => 'array',
        'technologies_translations' => 'array',
        'results' => 'array',
        'results_translations' => 'array',
        'features' => 'array',
        'features_translations' => 'array',
        'is_active' => 'boolean',
        'title_translations' => 'array',
        'category_translations' => 'array',
        'description_translations' => 'array',
        'web_type_translations' => 'array',
        'use_cases_translations' => 'array',
        'challenge_translations' => 'array',
        'solution_translations' => 'array',
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
     * Get the translated category based on current locale
     */
    public function getTranslatedCategoryAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->category_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->category;
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
     * Get the translated web_type based on current locale
     */
    public function getTranslatedWebTypeAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->web_type_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->web_type;
    }

    /**
     * Get the translated use_cases based on current locale
     */
    public function getTranslatedUseCasesAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->use_cases_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->use_cases;
    }

    /**
     * Get the translated challenge based on current locale
     */
    public function getTranslatedChallengeAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->challenge_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->challenge;
    }

    /**
     * Get the translated solution based on current locale
     */
    public function getTranslatedSolutionAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->solution_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->solution;
    }

    /**
     * Get the translated technologies based on current locale
     */
    public function getTranslatedTechnologiesAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->technologies_translations ?? [];
        
        if (isset($translations[$locale]) && is_array($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->technologies ?? [];
    }

    /**
     * Get the translated results based on current locale
     */
    public function getTranslatedResultsAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->results_translations ?? [];
        
        if (isset($translations[$locale]) && is_array($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->results ?? [];
    }

    /**
     * Get the translated features based on current locale
     */
    public function getTranslatedFeaturesAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->features_translations ?? [];
        
        if (isset($translations[$locale]) && is_array($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->features ?? [];
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
