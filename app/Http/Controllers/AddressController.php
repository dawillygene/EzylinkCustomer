<?php
namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AddressController extends Controller
{
 
    public function index(): JsonResponse
    {
        $addresses = Address::all();
        return response()->json($addresses);
    }


    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',  
            'type' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'postal_code' => 'required|string',
            'active' => 'required|boolean',
        ]);

        $address = Address::create($validated);

        return response()->json($address, 201);  
    }

 
    public function show(Address $address): JsonResponse
    {
        return response()->json($address);
    }

 
    public function update(Request $request, Address $address): JsonResponse
    {
        $validated = $request->validate([
            'user_id' => 'exists:users,id',  
            'type' => 'string',
            'address' => 'string',
            'city' => 'string',
            'postal_code' => 'string',
            'active' => 'boolean',
        ]);

        $address->update($validated);

        return response()->json($address);
    }

  
    public function destroy(Address $address): JsonResponse
    {
        $address->delete();

        return response()->json(['message' => 'Address deleted successfully']);
    }
}
