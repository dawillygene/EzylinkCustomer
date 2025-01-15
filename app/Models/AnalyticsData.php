<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnalyticsData extends Model
{

use HasFactory;

protected $table = 'analytics_data';

protected $primaryKey = 'analytics_id';

protected $fillable = [
        'date',
        'metric_type',
        'value',
];

public $timestamps = false;

}
