<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\UpdateStatusNotification;
use App\Mail\UpdateStatusFailNotification;

class DashboardController extends Controller
{
  // Method untuk menampilkan halaman dashboard
  public function index()
  {
    // Mengambil semua laporan beserta informasi pengguna yang melaporkannya
    $laporan = Laporan::with('user')->get();
    $laporan = Laporan::orderBy('created_at','desc')->paginate(10);
    return view('dashboard.index', compact('laporan'));
  }

  // Method untuk memperbarui status laporan
  public function updateStatus(Request $request, Laporan $laporan)
  {    // Validasi data yang diterima dari request
    $validatedData = $request->validate([
      'status' => 'required|string|max:255',
    ]);

    // Memperbarui status laporan dengan data yang divalidasi
    $laporan->update($validatedData);

    // Mengambil kembali data laporan dengan informasi pengguna yang melaporkannya
    $laporanUser = Laporan::with('user')->where('id', $laporan->id)->first();
    $name = $laporan->user->nama; // Mengambil nama pengguna

    // Mengirim notifikasi melalui email kepada pengguna yang melaporkan laporan
    if ($laporan->status==='Sudah Selesai') {
        Mail::to($laporanUser->user->email)->send(new UpdateStatusNotification($name));

    } else {
        Mail::to($laporanUser->user->email)->send(new UpdateStatusFailNotification($name));
    }



    // Mengalihkan pengguna kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->back()->with('success', 'Status laporan berhasil diperbarui');
  }
}
