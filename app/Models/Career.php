<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'employment_type',
        'experience',
        'description',
        'requirements',
        'salary_range',
        'status',
    ];

    protected static function booted()
    {
        static::creating(function ($career) {
            if (empty($career->slug)) {
                $career->slug = Str::slug($career->title);
            }
        });
    }

    public function applications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
