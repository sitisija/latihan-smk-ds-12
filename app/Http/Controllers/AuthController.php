<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengguna;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function aksi_register(Request $request){
        $request->validate([
            'nama'=>'required',
            'email'=>'required |email|unique:pengguna,email',
            'password'=>'required'
        ],
        [
            'nama.required'=>'Nama harus di isi',
            'password.required'=>'Password harus di isi',
            'email.required'=>'Email harus di isi',
            'email.email'=>'Email tidak valid'
        ]
    );
    Pengguna::insert([
        'nama' => $request->nama,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);
    return redirect()->back()->with('register', 'Berhasil register');
    }
    public function login(){
        return view('auth.login');
    }
    public function aksi_login(Request $request){
            $request->validate([
                'email'=>'required |email',
                'password'=>'required'
            ],
            [
                'password.required'=>'Password harus di isi',
                'email.required'=>'Email harus di isi',
                'email.email'=>'Email tidak valid'
            ]
        );
        $credentials = $request->only(['email','password']);
        // ['email'=>$request->email,
        // 'password'=>$request->password];
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return redirect()->back();
    }
    public function logout(Request $request){

        //fungsi untuk menghapus data session(kegiatan) sedang login
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
