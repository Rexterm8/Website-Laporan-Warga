<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
  // Method untuk menampilkan halaman laporan
  public function index()
  {
    // Memeriksa peran pengguna yang sedang masuk
    if (auth()->user()->role == "admin") {
      // Jika pengguna adalah admin, redirect ke halaman dashboard
      return redirect()->route('dashboard.index');
    } else {
      // Jika pengguna adalah pengguna biasa, tampilkan halaman laporan
      return view('laporan');
    }
  }

  public function tracking(Request $request)
  {
    $laporan = Laporan::find($request->id);
    // dd($laporan->created_at->diffInDays());$laporans = Laporan::all();

    switch ($laporan->kategori) {
        case 'Fasilitas Umum':
            $hari = 7;
            break;

        case 'Kriminal':
            $hari = 3;
            break;
    }

    $diffCounter = floor($laporan->created_at->diffInDays()/$hari);
    // dd($diffCounter);
      return view('Tracking.tracking', compact('laporan','hari','diffCounter'));

  }

  // Method untuk menyimpan laporan baru
  public function store(Request $request)
  {
    // Validasi data yang diterima dari request
    $validatedData = $request->validate([
      'isi' => 'required|string',
      'kategori'=> 'required',//masih blm bs muncul kategori
      'lampiran' => 'required|file',
    ]);

    // Membuat objek laporan baru
    $laporan = new Laporan();

    // Mengelola lampiran yang diunggah
    if ($request->hasFile('lampiran')) {
      $lampiran = $request->file('lampiran');

      $lampiranName = time() . '_' . $lampiran->getClientOriginalName();
      $lampiran->move('lampiran', $lampiranName);
    } else {
      $lampiranName = null;
    }

    // Mengisi atribut-atribut laporan
    $laporan->kategori =$validatedData['kategori']; //masih blm bs muncul kategori bahkan tidak bisa success submit
    $laporan->name = $validatedData['isi'];
    $laporan->lampiran = 'lampiran/' . $lampiranName;
    $laporan->status = 'Sedang Berjalan';
    $laporan->user_id = auth()->user()->id;

    // Menyimpan laporan ke dalam database
    $laporan->save();

    // Mengalihkan pengguna kembali dengan pesan sukses
    return redirect()->back()->with('success', 'Laporan berhasil disubmit. Mohon tunggu hingga Admin menindaklanjuti laporan Anda');
  }
}
