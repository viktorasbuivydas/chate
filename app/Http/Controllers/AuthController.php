<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('Auth/Login');
    }

    public function loginUser()
    {
        $credentials = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (auth()->attempt($credentials)) {
            request()->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
