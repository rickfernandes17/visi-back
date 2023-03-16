<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (Request $request) {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token['token'] = $user->createToken($request['name'])->plainTextToken;
        return response()->json($token);
    }

    public function logout (Request $request) {
        $isUser = Auth::user()->tokens()->delete();
        if($isUser){
            return response()->json('Logout efetuado com sucesso',200);
        }
    }

    public function teste(Request $request){
        return response()->json(Auth::user());
    }
    public function GetTokens(){
        $token = Auth::user()->tokens;
        return response()->json($token);
    }
}
