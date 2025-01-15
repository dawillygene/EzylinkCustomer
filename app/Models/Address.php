<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;
    protected $table = 'addresses';
    protected $primaryKey = 'address_id';
    protected $fillable = [
        'address_line1',
        'address_line2',
        'city',
        'state',
        'zip_code',
        'country',
    ];

    public $timestamps = false;

}
