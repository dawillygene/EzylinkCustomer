<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    /** @use HasFactory<\Database\Factories\ProductReviewFactory> */
    use HasFactory;

    protected $table = 'product_reviews';
    protected $primaryKey = 'review_id';
    protected $fillable = [
        'id',
        'product_id',
        'rating',
        'review_text',
        'review_date',
    ];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}
