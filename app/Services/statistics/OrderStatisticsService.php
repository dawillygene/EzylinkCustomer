<?php

namespace App\Services\statistics;

use App\Models\Order;
use Carbon\Carbon;

class OrderStatisticsService {
  
    public function getTotalRevenue() {
        return Order::sum('total_price');
    }

    public function getAverageOrderValue() {
        $totalRevenue = $this->getTotalRevenue();
        $totalOrders = $this->getTotalOrders();
        return $totalOrders > 0 ? $totalRevenue / $totalOrders : 0;
    }

    public function getTotalOrders() {
        return Order::count();
    }

 
    public function getOrdersByStatus($status) {
        return Order::where('status', $status)->count();
    }

    // Revenue for a specific time period (e.g., last 30 days)
    public function getRevenueForPeriod($days = 30) {
        return Order::where('order_date', '>=', Carbon::now()->subDays($days))
                    ->sum('total_price');
    }


    public function getOrdersForPeriod($days = 30) {
        return Order::where('order_date', '>=', Carbon::now()->subDays($days))
                    ->count();
    }

    // Top N users by total spending
    public function getTopUsersBySpending($limit = 5) {
        return Order::with('user')
                    ->selectRaw('id, SUM(total_price) as total_spent')
                    ->groupBy('id')
                    ->orderByDesc('total_spent')
                    ->limit($limit)
                    ->get();
    }
}