<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk halaman registrasi
Route::get('/register', [RegisterController::class, 'index'])->name('register.index')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// Rute untuk halaman dashboard (hanya bisa diakses setelah login)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('auth');
Route::put('/dashboard/update-status/{laporan}', [DashboardController::class, 'updateStatus'])->name('dashboard.updateStatus')->middleware('auth');

// Rute untuk halaman riwayat laporan (hanya bisa diakses setelah login)
Route::get('/history', [HistoryController::class, 'index'])->name('history.index')->middleware('auth');

// Rute untuk halaman pengelolaan laporan (hanya bisa diakses setelah login)
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index')->middleware('auth');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store')->middleware('auth');

Route::get('/tracking/{id}', [LaporanController::class, 'tracking'])->name('tracking.index')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
