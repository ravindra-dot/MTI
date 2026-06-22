<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
    'user_id',
    'contest_name',
    'theme',
    'category',
    'payment_status',
    'payment_amount',
    'blueprint_downloaded',
    'artwork_file',
    'submission_status',
    'admin_remark',
    'numerical_score',
    'rank',
    'reviewed_by',
    'reviewed_at',
    'certificate_generated',
    'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    public function reviewer()
    {
        return $this->belongsTo(Admin::class, 'reviewed_by');
    }
}
