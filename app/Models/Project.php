<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'client_name',
        'category',
        'description',
        'challenge',
        'solution',
        'technology_stack',
        'image',
        'project_url',
        'status',
        'is_featured',
    ];

    protected $casts = [
        'technology_stack' => 'array',
        'is_featured' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($project) {
            if (empty($project->slug)) {
                $project->slug = Str::slug($project->title);
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
