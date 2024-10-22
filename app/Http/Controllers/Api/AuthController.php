<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
 
    
public function login(Request $request):JsonResponse
{
  $request->validate([
    'email' =>'required|email',
    'password' => 'required|min:8',
  ]);

 $user = User::where('email', $request->email)->first();
 if (!$user || !Hash::check($request->password,$user->password)) {
   return response()->json([
     'message' => 'The provided credentials are incorrect'
   ], 401);
 }
  
$token = $user->createToken($user->name.'Auth-Token')->plainTextToken; 

return response()->json([
 'message' => 'Logged in successfully',
  'access_token' => $token,
  'token_type' => 'Bearer',200]);

}

public function register(Request $request) : JsonResponse 
{
 
    try{
    $request->validate([
      'name' =>'required|string|max:255',
      'email' =>'required|string|email|unique:users,email',
      'password' => 'required|string|min:8',
    ]);

    $user = User::create([
      'name' => $request->name,
      'email' => $request->email,
      'password' => Hash::make($request->password),
    ]);

    if($user){
 $token = $user->createToken($user->name.'Auth-Token')->plainTextToken;
 return response()->json([
  'message' => 'User registered successfully',
   'access_token' => $token,
   'token_type' => 'Bearer',200]);
    }
    else{
      return response()->json([
       'message' => 'Something went wrong while Registration'
      ], 401);
    }
}catch(Exception $e){
    return response()->json([
     'message' => 'Error : '.$e->getMessage()
    ], 401);
}
}


public function logout(Request $request): JsonResponse
{
    
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'Logged out successfully'
    ], 200);
}



}
