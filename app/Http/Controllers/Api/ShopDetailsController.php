<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\ShopDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopDetailsController extends Controller
{
    public function index()
    {
        return response()->json(ShopDetails::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:20',
            'email' => 'required|email|unique:shop_details',
            'birth_of_date' => 'required|date',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',

            // Validation for company and bank details
            'company_name' => 'required|string|max:255',
            'company_type' => 'required|string|max:255',
            'pan_card_number' => 'required|string|max:255',
            'account_number' => 'required|string|unique:shop_details',
            'bank_name' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'account_holder_name' => 'required|string|max:255',
        ]);
        try {

            $shopDetails = ShopDetails::create($validatedData);
            return response()->json($shopDetails, 201);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function show($id)
    {
        $shopDetails = ShopDetails::find($id);

        if (!$shopDetails) {
            return response()->json(['message' => 'Shop details not found'], 404);
        }
        try {
            return response()->json($shopDetails, 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        $shopDetails = ShopDetails::find($id);

        if (!$shopDetails) {
            return response()->json(['message' => 'Shop details not found'], 404);
        }

        $validatedData = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'contact_number' => 'sometimes|required|string|max:20',
            'email' => 'sometimes|required|email|unique:shop_details,email,' . $id,
            'birth_of_date' => 'sometimes|required|date',
            'city' => 'sometimes|required|string|max:255',
            'country' => 'sometimes|required|string|max:255',
            'zip_code' => 'sometimes|required|string|max:10',
            'account_number' => 'sometimes|required|string|unique:shop_details,account_number,' . $id,
        ]);

        try {

            $shopDetails->update($validatedData);
            return response()->json($shopDetails, 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }

    public function destroy($id)
    {
        $shopDetails = ShopDetails::find($id);

        if (!$shopDetails) {
            return response()->json(['message' => 'Shop details not found'], 404);
        }
        try {
            $shopDetails->delete();
            return response()->json(['message' => 'Shop details deleted successfully'], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 400);
        }
    }
}
