<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    /** @use HasFactory<\Database\Factories\UserAddressFactory> */
    use HasFactory;

    
     protected $table = 'user_addresses';


     protected $primaryKey = 'user_address_id';
 
     protected $fillable = [
         'id',
         'address_id',
         'is_default',
     ];
 
     public $timestamps = false;
 
     public function user()
     {
         return $this->belongsTo(User::class, 'id');
     }
 
     public function address()
     {
         return $this->belongsTo(Address::class, 'address_id');
     }
}
