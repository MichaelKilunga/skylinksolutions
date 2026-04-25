<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'university',
        'program',
        'year_of_study',
        'start_date',
        'end_date',
        'duration_weeks',
        'experience',
        'learning_goals',
        'source',
        'attachment',
    ];
}
