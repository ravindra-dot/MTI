<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'dob',
        'qualification',
        
        'email_verified',
        'otp',
        'otp_expires_at',
    ];

    protected $hidden = [
        'password',
    ];

    //user enrollments
    public function enrollment()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords(strtolower($value));
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords(strtolower($value));
    }
}
