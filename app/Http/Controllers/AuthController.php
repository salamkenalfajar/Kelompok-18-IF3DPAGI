<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function daftar()
    {
        return view('auth.daftar');  
    }

    public function daftar_post(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|', // Validasi password dengan konfirmasi
        ]);

        // Buat user baru
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_role = 0; 
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        $credentials = $request->only('name', 'password');

        if (Auth::attempt($credentials, true)) {
            // Cek role setelah berhasil login
            if (Auth::user()->is_role == 2) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->is_role == 1) {
                return redirect()->route('admin.dashboard');
            } elseif (Auth::user()->is_role == 0) {
                return redirect()->route('user.halamandeteksi');
            }
        }

        return redirect()->back()->with('error', 'Invalid credentials!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have logged out!');
    }
}
