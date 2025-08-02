<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function viewLogin() {
        return view('Auth.login');
    }

    public function storeLogin(Request $request)
    {
        $request->validate([
            "username" => "required",
            'password' => "required"
        ]);
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            $request->session()->regenerate();
            return view('Dashboard.index');
        }

        return redirect()->back()->with("gagal", "Username Atau Password Salah, Silahkan Coba Kembali");
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login')->with('sukses', "Sukses Logout");
    }
}
