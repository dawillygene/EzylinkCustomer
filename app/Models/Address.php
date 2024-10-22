<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'address',
        'city',
        'postal_code',
        'active',
    ];


    public function orders()
    {
        return $this->hasMany(Order::class, 'delivery_address_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
