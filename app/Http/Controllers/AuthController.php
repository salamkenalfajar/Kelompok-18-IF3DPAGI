<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        Log::info('Register function started');

        try {
            // Validasi input pengguna
            $validatedData = $request->validate([
                'username' => 'required|string|max:255|unique:users,username',  // Validasi username unik
                'email' => 'required|email|unique:users,email',  // Validasi email unik
                'password' => [
                    'required',
                    'string',
                    'min:8',
                    'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/', // Huruf besar, kecil, dan angka
                ],
            ], [
                'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
                'email.unique' => 'Email sudah terdaftar. Silakan pilih email lain.',
                'password.regex' => 'Password harus mengandung setidaknya satu huruf besar, satu huruf kecil, dan satu angka.',
            ]);

            Log::info('Validation successful', $validatedData); // Log jika validasi berhasil

            // Membuat pengguna baru
            $user = User::create([
                'username' => $validatedData['username'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'is_admin' => false,
            ]);
            Log::info('User created successfully', ['user_id' => $user->id]); // Log jika pengguna berhasil dibuat

            // Redirect ke halaman login dengan pesan sukses
            return redirect()->route('login')->with('status', 'Registration successful! You can now log in.');
        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan di log
            Log::error('Error during registration: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Something went wrong during registration']);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['username' => $validatedData['username'], 'password' => $validatedData['password']])) {
            $request->session()->regenerate();

        
            Log::info('Login successful for user: ' . Auth::user()->username);


            if (Auth::user()->is_admin) {
                return redirect()->route('pengguna');
            }

            return redirect()->route('halamandeteksi');
        }

        Log::warning('Login failed for username: ' . $validatedData['username']);

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function createAdmin()
    {
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        return "Admin created successfully";
    }


    public function checkUsername(Request $request)
{
    $usernameExists = User::where('username', $request->username)->exists();
    return response()->json(['exists' => $usernameExists]);
}

// Menambahkan metode untuk cek email
public function checkEmail(Request $request)
{
    $emailExists = User::where('email', $request->email)->exists();
    return response()->json(['exists' => $emailExists]);
}

}
