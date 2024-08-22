<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // Specify the table name if it doesn't follow Laravel's convention
    protected $table = 'customer';

    // Define which attributes are mass assignable
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'address',
    ];

    // If you are using timestamps, you may need this line
    public $timestamps = true;
}
