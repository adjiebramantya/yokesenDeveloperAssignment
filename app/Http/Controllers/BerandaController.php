<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BerandaController extends Controller
{
    public function index(Request $request)
    {
        $data = User::when($request->keyword, function($query) use ($request){
            $query->where('name','like',"%{$request->keyword}%")->orWhere('email','like',"%{$request->keyword}%");
        })->orderBy('name', 'ASC')->orderBy('created_at', 'ASC')->paginate(20);
        return view('beranda', compact('data'));
    }
}
