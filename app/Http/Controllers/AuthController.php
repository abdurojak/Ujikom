<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Pengguna;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('dashboard.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect sesuai role
            if (auth()->user()->role == 'admin') {
                return redirect()->intended('/admin')->with('success', 'Login Berhasil');
            }

            return redirect()->intended('/mahasiswa')->with('success', 'Login berhasil');
        }
        // dd('wow', $credentials);

        return redirect()->back()->with('error', 'Username atau Password Salah');
    }

    // Proses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
