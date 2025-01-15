<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProducerPromotion;

class UserPromotion extends Model
{
    /** @use HasFactory<\Database\Factories\UserPromotionFactory> */
    use HasFactory;

    protected $table = 'user_promotions';
    protected $primaryKey = 'user_promotion_id';

 
    protected $fillable = [
        'id',
        'promotion_id',
        'applied_to_order_id',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function promotion()
    {
        return $this->belongsTo(ProducerPromotion::class, 'promotion_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'applied_to_order_id');
    }
}
