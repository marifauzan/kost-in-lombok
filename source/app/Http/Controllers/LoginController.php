<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // View halaman login
    public function index(){
        return view("login.login", [
            "title" => "Login"
        ]);
    }

    // fungsi autentikasi login
    public function auth(Request $request){
        // validasi input value
        $credentials = $request->validate([
            "username"=>"required",
            "password"=>"required"
        ]);

        // cek kesesuian username dan passsword
        if(Auth::attempt($credentials)){
            // buat session baru jika sesuai
            $request->session()->regenerate();

            // cek role user
            if(Auth::user() && Auth::user()->is_owner == 1){
                // jika role user adalah owner maka redirect ke halaman owner
                return redirect('/owner');
            }else {
                // jika role user adalah customer maka redirect ke halaman utama
                return redirect('/');
            }
        }

        // jika username dan password tidak sesuuai kembalikan ke halaman login
        return redirect('/login')->with('invalid', 'username atau password salah');


    }
}
