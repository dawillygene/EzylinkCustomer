<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryArea extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryAreaFactory> */
    use HasFactory;
    protected $table = 'delivery_areas';
    protected $primaryKey = 'area_id';
    protected $fillable = [
        'name',
        'coverage_area',
        'delivery_fee',
    ];

    public $timestamps = false;

}
