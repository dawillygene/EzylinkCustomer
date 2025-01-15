<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'producer_id',
        'category_id',
        'name',
        'description',
        'price',
        'image_url',
        'stock_quantity',
    ];

    public $timestamps = false;
      public function producer()
      {
          return $this->belongsTo(Producer::class, 'producer_id', 'producer_id');
      }
  

      public function category()
      {
          return $this->belongsTo(Category::class, 'category_id', 'category_id');
      }

      public function orderItems()
      {
          return $this->hasMany(OrderItem::class, 'product_id', 'product_id');
      }

      public function promotions()
    {
        return $this->hasMany(ProducerPromotion::class, 'product_id', 'product_id');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'product_id');
    }
}
