<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentsFactory> */
    use HasFactory;
    protected $table = 'payments';
    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'order_id',
        'payment_method',
        'transaction_id',
        'amount',
        'payment_date',
    ];

    public $timestamps = false;
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}
