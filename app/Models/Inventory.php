<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    /** @use HasFactory<\Database\Factories\InventoryFactory> */
    use HasFactory;

      protected $table = 'inventory';
      protected $primaryKey = 'inventory_id';

      protected $fillable = [
          'product_id',
          'quantity',
          'reorder_level',
          'last_updated',
      ];
  
      public $timestamps = false;
  
      public function product()
      {
          return $this->belongsTo(Product::class, 'product_id');
      }
}
