<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'type',
        'duration',
        'level',
        'description',
        'skills',
        'project_details',
        'certificate',
        'fee',
        'image',
        'status',
    ];

    protected $casts = [
        'skills' => 'array',
        'certificate' => 'boolean',
    ];

    protected static function booted()
    {
        static::creating(function ($program) {
            if (empty($program->slug)) {
                $program->slug = Str::slug($program->title);
            }
        });
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
