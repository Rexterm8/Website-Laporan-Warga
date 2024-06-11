<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  // Method untuk menampilkan halaman registrasi
  public function index()
  {
    return view('auth.register');
  }

  // Method untuk menyimpan data registrasi baru
  public function store(Request $request)
  {
    // Validasi data yang diterima dari request
    $validatedData = $request->validate([
      'nama' => 'required|max:255',
      'email' => 'required|unique:users|email:dns|max:255',
      'nik' => 'required|unique:users|numeric|digits:16',
      'gender' => 'required',
      'tanggal_lahir' => 'required|date|before:today',
      'password' => 'required|min:5|max:255',
      'remember_token' => '',
    ]);
    // Mengenkripsi password sebelum disimpan
    $validatedData['password'] = Hash::make($validatedData['password']);
    // Set peran pengguna sebagai 'user'
    $validatedData['role'] = 'user';

    // Membuat entitas pengguna baru berdasarkan data yang divalidasi
    User::create($validatedData);

    // Redirect pengguna ke halaman login dengan pesan sukses
    return redirect('/login')->with('success', 'Registrasi berhasil! Harap login');

  }
}
