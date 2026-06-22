<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'theme',
        'rules',
        'prizes',
        'banner',
        'category',
        'age_group',
        'entry_fee',
        'registration_start',
        'registration_end',
        'submission_deadline',
        'result_date',
        'is_active',
    ];

}
