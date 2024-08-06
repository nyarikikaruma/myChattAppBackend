<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request) {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful


            return response()->json([
                'status' => 'success',
                'user' => $user,
            ], 200);
        }

        // Authentication failed
        return response()->json([
            'status' => 'error',
            'message' => 'Invalid credentials',
        ], 401);
    }


    public function login() {

    }
}
