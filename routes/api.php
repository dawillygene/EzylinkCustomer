<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\ShopDetailsController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;


Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {
    
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/profile',[AuthController::class,'profile']);

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('shop_details', ShopDetailsController::class);




   
});






Route::apiResource('addresses', AddressController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('orders.items', OrderItemController::class);







Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





