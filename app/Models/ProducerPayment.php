<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProducerPayment extends Model
{
    /** @use HasFactory<\Database\Factories\ProducerPaymentFactory> */
    use HasFactory;

    protected $table = 'producer_payments';
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'producer_id',
        'payment_type',
        'account_details',
        'default_payment',
    ];

    public $timestamps = false;

    public function producer()
    {
        return $this->belongsTo(Producer::class, 'producer_id');
    }

}

