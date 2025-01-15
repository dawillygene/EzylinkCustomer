<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

 
    public function index()
    {
        $orders = $this->orderService->getAllOrdersWithDetails();
        return response()->json($orders);
    }


    public function getCurrentOrders(Request $request)
    {
        $statuses = $request->input('statuses', ['pending', 'processing']);

        $currentOrders = $this->orderService->getCurrentOrders($statuses);
        return response()->json($currentOrders);
    }

    public function show(int $orderId)
    {
        $order = $this->orderService->getOrderWithDetails($orderId);
        return response()->json($order);
    }

  
    public function store(Request $request)
    {
        $orderData = $request->only(['id', 'order_date', 'total_price', 'status', 'delivery_address', 'delivery_slot']);
        $orderItemsData = $request->input('order_items', []);

        $order = $this->orderService->createOrder($orderData, $orderItemsData);
        return response()->json($order, 201);
    }

   
    public function update(Request $request, int $orderId)
    {
        $orderData = $request->only(['order_date', 'total_price', 'status', 'delivery_address', 'delivery_slot']);
        $order = $this->orderService->updateOrder($orderId, $orderData);
        return response()->json($order);
    }


    public function destroy(int $orderId)
    {
        $success = $this->orderService->deleteOrder($orderId);
        return response()->json(['success' => $success]);
    }


    public function getUserOrders(int $userId)
    {
        $orders = $this->orderService->getOrdersForUser($userId);
        return response()->json($orders);
    }
}