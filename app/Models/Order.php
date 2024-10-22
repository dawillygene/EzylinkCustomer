<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_address_id',
        'location',
        'category',
        'restaurant',
        'total_price',
        'payment_method',
        'delivery_address',
    ];


    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function address()
    {
        return $this->belongsTo(Address::class, 'delivery_address_id');
    }
}
