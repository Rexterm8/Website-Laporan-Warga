<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  // Method untuk menampilkan halaman login
  public function index()
  {
    return view('auth.login');
  }

  // Method untuk melakukan proses otentikasi pengguna
  public function authenticate(Request $request)
  {
    // Validasi kredensial yang diterima dari request
    $credentials = $request->validate([
      'email' => 'required|email:dns',
      'password' => 'required'
    ]);

    // Memeriksa kredensial pengguna dengan metode Auth
    if (Auth::attempt($credentials)) {
      // Jika otentikasi berhasil, atur ulang sesi
      $request->session()->regenerate();

      // Redirect pengguna ke halaman yang dimaksud sebelumnya (jika ada)
      return redirect()->intended('/');
    }

    // Jika otentikasi gagal, kembalikan dengan pesan error
    return back()->with('loginError', 'Login Gagal!');
  }

  // Method untuk proses logout pengguna
  public function logout(Request $request)
  {
    // Logout pengguna
    Auth::logout();

    // Menghapus sesi pengguna
    $request->session()->invalidate();

    // Menyegarkan token sesi
    $request->session()->regenerateToken();

    // Redirect pengguna ke halaman utama
    return redirect('/');
  }
}
