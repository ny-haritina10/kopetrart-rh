<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalentNeed extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'study_year_start',
        'study_year_end',
        'experience_year_start',
        'experience_year_end',
        'contract_type',
        'gender',
        'minimum_age',
        'expiration_date',
        'priority',
        'additional_info',
        'department',        // New field
        'required_date',     // New field
        'status'             // New field
    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
