<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::when($request->keyword, function($query) use ($request){
            $query->where('name','like',"%{$request->keyword}%")->orWhere('email','like',"%{$request->keyword}%");
        })->orderBy('name', 'ASC')->orderBy('created_at', 'ASC')->paginate(20);
        return view('beranda', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::Findorfail($id);
        return view('pengguna.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data= User::findorfail($id);

        if($request->password == null && $request->password ==''){
            $data->name = $request->name;
            $data->email = $request->email;
            $data->alamat = $request->alamat;
            $data->no_telp = $request->no_telp;
        } else{
            $data->name = $request->name;
            $data->email = $request->email;
            $data->alamat = $request->alamat;
            $data->no_telp = $request->no_telp;
            $data->password = Hash::make($request->password);
        }

        if ($request->file('foto_profile')){
            if ($data->foto_profile!='' && $data->foto_profile != null){
                $file_old = 'img/'.$data->foto_profile;
                unlink($file_old);
            }

            $file = $request->file('foto_profile');
            $namaFile = time().str_replace(' ','',$file->getClientOriginalName());
            $data->foto_profile = $namaFile;

            $file->move(public_path().'/img',$namaFile);

        }

        $data->save();
        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function cari(Request $request)
    // {
    //     $cari = $request->cari;
        
    //     $data = User::where('name','like',"%".$cari."%")->where('email','like',"%".$cari."%")->paginate(20);
        
    //     return view('beranda',compact('data'));
    // }
}
