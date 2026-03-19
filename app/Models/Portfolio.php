<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'icon',
        'short_description',
        'excerpt_note',
        'overview',
        'thumbnail',
        'thumbnail_alt',
        'industry',
        'client_name',
        'project_date',
        'project_url',
        'tags',
        'key_features',
        'results',
        'sort_order',
        'is_featured',
        'is_published',
        'seo_title',
        'seo_description',
    ];

    protected $casts = [
        'tags' => 'array',
        'key_features' => 'array',
        'results' => 'array',
        'project_date' => 'date',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
}