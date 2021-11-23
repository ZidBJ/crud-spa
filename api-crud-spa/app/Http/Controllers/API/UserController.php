<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Register
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    }

    /**
     * login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return response()->json(Auth::user(), 200);
        }

        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.']
        ]);
    }


    /**
     * Logout
     */
    public function logout()
    {
        Auth::logout();
    }
}
