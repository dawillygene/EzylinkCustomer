<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    /** @use HasFactory<\Database\Factories\ProducerFactory> */
    use HasFactory;
    protected $table = 'producers';
    protected $primaryKey = 'producer_id';
    protected $fillable = [
        'business_name',
        'contact_name',
        'email',
        'password',
        'phone_number',
        'registration_date',
    ];

    public $timestamps = false;
    protected $hidden = [
        'password',
    ];

    // Cast registration_date to a datetime object
    protected $casts = [
        'registration_date' => 'datetime',
    ];

   
}
