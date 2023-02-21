<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return inertia('Auth/Login');
    }

    public function loginProcess(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

         if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
