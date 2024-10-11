<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ShopDetailsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::middleware('auth:sanctum')->group(function () {
   
});

Route::apiResource('customers', CustomerController::class);
Route::apiResource('shop_details', ShopDetailsController::class);
Route::apiResource('sho_details', ShopDetailsController::class);
