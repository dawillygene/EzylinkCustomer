<?php

namespace App\Services\statistics;

use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductStatisticsService {
    // Total number of products
    public function getTotalProducts() {
        return Product::count();
    }

    // Average price of products
    public function getAverageProductPrice() {
        return Product::avg('price');
    }

    // Number of products in a specific category
    public function getProductsByCategory($categoryId) {
        return Product::where('category_id', $categoryId)->count();
    }

    // Number of products with low stock (e.g., stock_quantity < 10)
    public function getLowStockProducts($threshold = 10) {
        return Product::where('stock_quantity', '<', $threshold)->count();
    }

    // Total value of all products in stock
    public function getTotalStockValue() {
        return Product::sum(DB::raw('price * stock_quantity'));
    }

    // Top N products by stock quantity
    public function getTopProductsByStock($limit = 5) {
        return Product::orderByDesc('stock_quantity')
                      ->limit($limit)
                      ->get();
    }

    // Top N products by price
    public function getTopProductsByPrice($limit = 5) {
        return Product::orderByDesc('price')
                      ->limit($limit)
                      ->get();
    }

    // Number of products by producer
    public function getProductsByProducer($producerId) {
        return Product::where('producer_id', $producerId)->count();
    }
}