<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPerson extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryPersonFactory> */
    use HasFactory;
    protected $table = 'delivery_persons';
    protected $primaryKey = 'delivery_person_id';
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'status',
    ];

    public $timestamps = false;
}
