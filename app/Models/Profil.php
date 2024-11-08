<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'position',
        'technical_skills',
        'experience_years',
        'experience_description'
    ];

    protected $casts = [
        'technical_skills' => 'array'
    ];
}