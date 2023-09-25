<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{

    public function login(Request $request){

    $request->validate([
    'email' => 'required|email',
    'password' => 'required'
    ]);
        
    
    $credentials = $request->only('email', 'password');
    
        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }
    
    $user = Auth::user();
    $token = $user->createToken('AdminToken')->plainTextToken;  //autenticación ok -> genera token

    return response()->json(['token' => $token]);
}

public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();  //obtiene token actual y lo elimina
    return response()->json(['message' => 'Logged out successfully']);
}


}
