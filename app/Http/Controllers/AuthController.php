<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('authToken')->plainTextToken;

        return response(['user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required|exists:users',
            'password' => 'required|min:6'
        ]);

        if (!Auth::attempt($data)) {
            return response(['message' => 'Invalid credentials']);
        }

        $user = User::where('email', $data['email'])->first();

        $token = $user->createToken('authToken')->plainTextToken;

        return response(['user' => $user, 'token' => $token,]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response(['status'=> true, 'message' => 'Logged out']);
    }

    public function userprofile()
    {
        $userData = Auth::user();
        return response()->json([
            'status' => true,
            'message' => 'User profile',
            'data' => $userData,
            'id'=> $userData->id,
        ],200);
    }
}