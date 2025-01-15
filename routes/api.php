<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;



Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function () {

});

    
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/profile',[AuthController::class,'profile']);

    Route::get('/dashboard',[DashboardController::class,'index']);
      



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');





