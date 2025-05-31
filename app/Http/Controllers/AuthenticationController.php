<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{

 public function register(Request $request)
{
    $validated = $request->validate([
        'first_name'            => ['required', 'string', 'max:255'],
        'last_name'             => ['required', 'string', 'max:255'],
        'username'              => ['required', 'string', 'max:255', 'unique:users'],
        'email'                 => ['required', 'email', 'max:255', 'unique:users'],
        'password'              => ['required', 'string', 'min:8'],
        'password_confirmation' => ['required', 'same:password'],
        'role_id'               => ['required'],
        'user_status_id'      => ['required'],
    ]);

    $user = User::create([
        'first_name'        => $validated['first_name'],
        'last_name'         => $validated['last_name'],
        'username'          => $validated['username'],
        'email'             => $validated['email'],
        'password'          => \Hash::make($validated['password']),
        'role_id'           => $validated['role_id'],
        'user_status_id'  => $validated['user_status_id'],
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'message' => 'User registered successfully!',
        'user'    => $user,
        'token'   => $token
    ], 201);
}


    // Login and return token
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User logged in successfully!',
            'user'    => $user,
            'token'   => $token
        ], 200);
    }

    // Logout and revoke all tokens
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'User logged out successfully!'], 200);
    }
}
