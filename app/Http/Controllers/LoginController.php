<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function defaultIndex()
    {
        return view('index', ['page' => 'Login']);
    }

    public function login(Request $request)
    {
        $validatedLogin = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($validatedLogin))
        {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        } else {
            return back()->with("failure", "Invalid username or password!");
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Signing out..');
    }
}
