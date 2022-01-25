<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pengguna.register');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' =>'required|unique:users|email:dns',
            'no_telp' => 'required',
            'alamat' => 'required',
            'password' =>'required|min:5|max:255'
        ]);

        // $validated['passsword'] = bcrypt($validated['passsword']);
        $validated['password'] = Hash::make($validated['password']);

        User::Create($validated);

        return redirect('login')->with('success','Registrasi Berhasil!!');
    }
}
