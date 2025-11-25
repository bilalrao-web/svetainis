<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $fillable = [
        'slug', 'title', 'category', 'service_slug', 'description', 'image',
        'technologies', 'web_type', 'use_cases', 'challenge', 'solution',
        'results', 'features', 'client', 'duration', 'team_size', 'order', 'is_active'
    ];

    protected $casts = [
        'technologies' => 'array',
        'results' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }
}
