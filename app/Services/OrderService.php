<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;


class OrderService
{

    public function getCurrentOrders(array $statuses = ['pending', 'processing'], int $perPage = 10)
    {
        return Order::with(['orderItems.product'])
            ->whereIn('status', $statuses)
            ->orderBy('order_date', 'desc')
            ->paginate($perPage);
    }


    public function getAllOrdersWithDetails(): Collection
    {
        return Order::with(['orderItems.product'])->get();
    }

    public function getOrderWithDetails(int $orderId): ?Order
    {
        return Order::with(['orderItems.product'])->find($orderId);
    }


     public function createOrder(array $orderData, array $orderItemsData): Order
    {        
  
        $order = Order::create($orderData);
        foreach ($orderItemsData as $itemData) {
            $product = Product::find($itemData['product_id']);
            if ($product) {
                $order->orderItems()->create([
                    'product_id' => $itemData['product_id'],
                    'quantity' => $itemData['quantity'],
                    'price_at_time_of_order' => $product->price,
                ]);
            }
        }

        return $order->load('orderItems.product'); 
    }




    public function updateOrder(int $orderId, array $orderData): ?Order
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->update($orderData);
        }
        return $order;
    }


    public function deleteOrder(int $orderId): bool
    {
        $order = Order::find($orderId);
        if ($order) {
            $order->orderItems()->delete(); 
            $order->delete();
            return true;
        }
        return false;
    }

   
    public function getOrdersForUser(int $userId): Collection
    {
        return Order::with(['orderItems.product'])
            ->where('id', $userId)
            ->get();
    }



}
