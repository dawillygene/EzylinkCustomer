<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducerPromotion extends Model
{
    /** @use HasFactory<\Database\Factories\ProducerPromotionFactory> */
    use HasFactory;


    protected $table = 'producer_promotions';
    protected $primaryKey = 'promotion_id';
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'discount_type',
        'discount_value',
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}

