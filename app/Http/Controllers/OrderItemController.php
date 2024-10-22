<?php
namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function index(Order $order)
    {
        return $order->orderItems; 
    }

    public function store(Request $request, Order $order)
    {
        $request->validate([
            'dish' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $orderItem = $order->orderItems()->create($request->all());

        return response()->json($orderItem, 201);
    }

    public function show(Order $order, OrderItem $orderItem)
    {
        return $orderItem; // Fetch a specific order item
    }

    public function update(Request $request, Order $order, OrderItem $orderItem)
    {
        $request->validate([
            'dish' => 'string',
            'quantity' => 'integer|min:1',
            'price' => 'numeric',
        ]);

        $orderItem->update($request->all());

        return response()->json($orderItem, 200);
    }

    public function destroy(Order $order, OrderItem $orderItem)
    {
        $orderItem->delete();

        return response()->json(null, 204);
    }
}
