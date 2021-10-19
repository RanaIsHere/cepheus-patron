<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function defaultIndex()
    {
        return view('index', ['page' => 'Login']);
    }

    public function login(Request $request)
    {
        // return view('dashboard.index', ['page' => 'Dashboard']);

        $validatedLogin = $request->validate([
            'email_address' => ['required'],
            'password' => ['required']
        ]);

        if ($validatedLogin['email_address'] == 'team_origin@protonmail.com') {
            if ($validatedLogin['password'] == 'admin') {
                return redirect('/dashboard')->with('success', 'Login has been successful!');
            }
        } else {
            return redirect('/')->with('failure', 'Invalid username or password!');
        }
    }
}
