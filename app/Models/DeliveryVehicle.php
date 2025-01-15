<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryVehicle extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryVehicleFactory> */
    use HasFactory;
    protected $table = 'delivery_vehicles';
    protected $primaryKey = 'vehicle_id';
    protected $fillable = [
        'vehicle_type',
        'license_plate',
        'status',
    ];

    public $timestamps = false;
}
