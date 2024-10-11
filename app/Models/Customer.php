<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'phone_number',
        'country',
        'state',
        'zip_code',
        'description',
        'password',
        'role',
        'status',
        'api_token',
    ];

    // Optional: Add default guard as 'api' for Sanctum
    protected $guard = 'api';
}
