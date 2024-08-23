<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Specify the table associated with the model (optional if the table name is 'users')
    protected $table = 'users';

    // Specify which attributes are mass assignable
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    // Specify which attributes should be hidden for arrays (e.g., password)
    protected $hidden = [
        'password',
    ];

    // Specify which attributes should be cast to native types
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Optionally, if you're using Laravel's default authentication, you can use these methods:
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
