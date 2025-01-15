<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    /** @use HasFactory<\Database\Factories\FeeFactory> */
    use HasFactory;

 protected $table = 'fees';
 protected $primaryKey = 'fee_id';
 protected $fillable = [
     'producer_id',
     'order_id',
     'fee_amount',
     'fee_date',
 ];

 public $timestamps = false;

 // Define relationships
 public function producer()
 {
     return $this->belongsTo(Producer::class, 'producer_id');
 }

 public function order()
 {
     return $this->belongsTo(Order::class, 'order_id');
 }

}
