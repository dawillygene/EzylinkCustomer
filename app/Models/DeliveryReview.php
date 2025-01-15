<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryReview extends Model
{
    /** @use HasFactory<\Database\Factories\DeliveryReviewFactory> */
    use HasFactory;

 protected $table = 'delivery_reviews';
 protected $primaryKey = 'review_id';
 protected $fillable = [
     'id',
     'delivery_id',
     'rating',
     'review_text',
     'review_date',
 ];

 public $timestamps = false;

 public function user()
 {
     return $this->belongsTo(User::class, 'id');
 }

 public function delivery()
 {
     return $this->belongsTo(Deliverie::class, 'delivery_id');
 }

}
