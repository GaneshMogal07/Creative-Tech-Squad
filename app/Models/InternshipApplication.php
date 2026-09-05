<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InternshipApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'college',
        'course',
        'graduation_year',
        'preferred_track',
        'resume_path',
        'message',
        'status',
    ];
}
