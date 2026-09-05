<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'short_description',
        'description',
        'features',
        'technology_stack',
        'image',
        'demo_url',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'features' => 'array',
        'technology_stack' => 'array',
        'is_featured' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeFeatured($query)
    {
        return $query->where('status', 'published')->where('is_featured', true);
    }
}
