<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class HistoryController extends Controller
{
  // Method untuk menampilkan riwayat laporan
  public function index()
  {
    // Memeriksa peran pengguna yang sedang masuk
    if (auth()->user()->role == "admin") {
      // Jika pengguna adalah admin, ambil semua laporan beserta informasi pengguna yang melaporkannya
      $laporan = Laporan::with('user')->latest()->paginate(10);

    } elseif (auth()->user()->role == "user") {
      // Jika pengguna adalah pengguna biasa, ambil laporan yang hanya milik pengguna tersebut
      $laporan = Laporan::with('user')->where('user_id', auth()->user()->id)->latest()->paginate(10);
    }

    // Mengirimkan data laporan ke halaman riwayat
    return view('history.index', compact('laporan'));
  }
}
