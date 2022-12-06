<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function home(){
        return view('dashboard');
    }

    public function login()
    {
        return view('login.form');
    }

    public function authenticate(Request $request)
    {
        // dd($request->all());
        $formData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($formData, true)) {

            return redirect()->route('dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
