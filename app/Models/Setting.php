<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'value_translations', 'type'];

    protected $casts = [
        'value_translations' => 'array',
    ];

    /**
     * Get the translated value based on current locale
     */
    public function getTranslatedValueAttribute()
    {
        $locale = app()->getLocale();
        $translations = $this->value_translations ?? [];
        
        if (isset($translations[$locale])) {
            return $translations[$locale];
        }
        
        return $this->value;
    }

    public static function get($key, $default = null)
    {
        $setting = self::where('key', $key)->first();
        if ($setting) {
            return $setting->translated_value;
        }
        return $default;
    }

    public static function set($key, $value, $type = 'text')
    {
        return self::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'type' => $type]
        );
    }
}
