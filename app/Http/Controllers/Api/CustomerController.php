<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
 
//         return response()->json([
//  'message' => 'hello',200

//         ]);


        return response()->json(Customer::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:customers',
            'email' => 'required|email|unique:customers',
            'phone_number' => 'required|string|max:15',
            'country' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string|max:10',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Hash the password

        $customer = Customer::create($validatedData);

        return response()->json($customer, 201);
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        return response()->json($customer, 200);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $validatedData = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255|unique:customers,username,' . $id,
            'email' => 'sometimes|required|email|unique:customers,email,' . $id,
            'phone_number' => 'sometimes|required|string|max:15',
            'country' => 'sometimes|required|string',
            'state' => 'sometimes|required|string',
            'zip_code' => 'sometimes|required|string|max:10',
            'password' => 'sometimes|required|string|min:6',
        ]);

        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $customer->update($validatedData);

        return response()->json($customer, 200);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return response()->json(['message' => 'Customer not found'], 404);
        }

        $customer->delete();

        return response()->json(['message' => 'Customer deleted successfully'], 200);
    }
}
