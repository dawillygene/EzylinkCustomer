<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducerAddress extends Model
{
    /** @use HasFactory<\Database\Factories\ProducerAddressFactory> */
    use HasFactory;

     protected $table = 'producer_addresses';

     protected $primaryKey = 'address_id';
 
     protected $fillable = [
         'producer_id',
         'address_line1',
         'address_line2',
         'city',
         'state',
         'zip_code',
         'country',
     ];
 
     public $timestamps = false;
 
     public function producer()
     {
         return $this->belongsTo(Producer::class, 'producer_id');
     }
}
