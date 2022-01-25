<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('pengguna.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' =>'required|email:dns',
            'password' =>'required|min:5|max:255'
        ]);

        if(Auth::attempt($validated)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError','Login Gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
