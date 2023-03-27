<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function actlogin(Request $request)
    {

        $validate = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $request->session()->regenerate();
        if (Auth::attempt($validate)) {
            if(Auth::user()->role == 'admin') {
                return redirect('dashboard');
            } else {
                return redirect('home');
            }
        } else {
            Session::flash('status', 'Login Gagal, coba lagi');
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
