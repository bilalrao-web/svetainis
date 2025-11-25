<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'intro', 'note', 'closing',
        'image', 'services_list', 'why_choose', 'benefits', 'service_details',
        'portfolio_project', 'order', 'is_active'
    ];

    protected $casts = [
        'services_list' => 'array',
        'why_choose' => 'array',
        'benefits' => 'array',
        'service_details' => 'array',
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
