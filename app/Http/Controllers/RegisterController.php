<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actregister(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|unique:users',
            'email' => 'required',
            'password' => 'required|min:5|max:255',
            'phone' => 'required|min:9|max:15'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::create($validate);
        // return redirect('login')->with('success', 'Registrasi Berhasil, Silahkan Login!');

        Session::flash('message', 'Register Berhasil. Silahkan login menggunakan username dan password.');
        return redirect('login');
    }
}
