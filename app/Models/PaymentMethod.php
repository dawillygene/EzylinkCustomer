<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentMethodFactory> */
    use HasFactory;


     protected $table = 'payment_methods';
     protected $primaryKey = 'payment_method_id';
      protected $fillable = [
         'id',
         'payment_type',
         'card_number',
         'expiration_date',
         'cvv',
         'default_payment',
     ];
 
     public $timestamps = false;
 
     public function user()
     {
         return $this->belongsTo(User::class, 'id');
     }
}
