<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function tambahUser(){
        return view('user.create');
    }

    public function simpanUser (Request $request)
    {

    $this->validate($request,[
            'nik' => 'required|numeric|unique:users,nik',
            'name' => 'required',
            'email' => 'required|email|unique:users,email', 
            'password' => 'required',
            'hp' => 'required|numeric|unique:users,hp', 
            'peran' => 'required',

        ], [
            'nik.required' => 'NIK harus diisi', 
            'nik.numeric' => 'NIK harus berupa angka', 
            'nik.unique' => 'NIK sudah terdaftar', 
            'name.required' => 'Nama harus diisi', 
            'email.required' => 'Email harus diisi', 
            'email.email' => 'Email tidak valid', 
            'email.unique' => 'Email sudah terdaftar', 
            'password.required' => 'Password harus diisi', 
            'hp.required' => 'Nomor HP harus diisi', 
            'hp.numeric' => 'Nomor HP harus berupa angka',
            'hp.unique' => 'Nomor HP sudah terdaftar',
            'peran' => 'Peran harus diisi'
        ]);

        $simpan = new user();
        $simpan->nik = $request->nik;
        $simpan->name = $request->name;
        $simpan->email = $request->email;
        $simpan->password = $request->password;
        $simpan->hp = $request->hp;
        $simpan->peran = $request->peran;
        $simpan->save();

        return redirect()->route('users.index');
    
    }

    public function hapusUser($id)
    {
        $hapus = User::find($id);
        $hapus->delete();
        return redirect()->route('users.index');
    }

    public function editUser($id){
        $edit = User::find($id);
        return view('users.edit', compact('edit'));
    }

    public function updateUser(Request $request, $id)
    {

        $this->validate($request,[
            'nik' => 'required|numeric|unique:users,nik'. $id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email'. $id, 
            'password' => 'required',
            'hp' => 'required|numeric|unique:users,hp' . $id, 
            'peran' => 'required',

        ], [
            'nik.required' => 'NIK harus diisi', 
            'nik.numeric' => 'NIK harus berupa angka', 
            'nik.unique' => 'NIK sudah terdaftar', 
            'name.required' => 'Nama harus diisi', 
            'email.required' => 'Email harus diisi', 
            'email.email' => 'Email tidak valid', 
            'email.unique' => 'Email sudah terdaftar', 
            'password.required' => 'Password harus diisi', 
            'hp.required' => 'Nomor HP harus diisi', 
            'hp.numeric' => 'Nomor HP harus berupa angka',
            'hp.unique' => 'Nomor HP sudah terdaftar',
            'peran' => 'Peran harus diisi'
        ]);

        $simpan = User::find($id);
        $simpan->nik = $request->nik;
        $simpan->name = $request->name;
        $simpan->email = $request->email;
        if ($request->password !=null){
            $simpan->password = bcrypt($request->password);
        }
        $simpan->hp = $request->hp;
        $simpan->peran = $request->peran;
        $simpan->save();
        return redirect()->route('users.edit');



    }

}