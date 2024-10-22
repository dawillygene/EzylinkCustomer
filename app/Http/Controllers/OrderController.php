<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        //return Order::with('order_items')->get(); 
        return Order::with('items')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string',
            'category' => 'required|string',
            'restaurant' => 'required|string',
            'total_price' => 'required|numeric',
            'paymentMethod' => 'required|string',
            'delivery_address' => 'required|string',
        ]);

        $order = Order::create($request->all());
        
        return response()->json($order, 201);
    }

    public function show(Order $order)
    {
        return $order->load('orderItems'); // Fetch a specific order with its items
    }

    public function update(Request $request, Order $order)
    {
        $request->validate([
            'location' => 'string',
            'category' => 'string',
            'restaurant' => 'string',
            'total_price' => 'numeric',
            'paymentMethod' => 'string',
            'delivery_address' => 'string',
        ]);

        $order->update($request->all());

        return response()->json($order, 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json(null, 204);
    }
}
