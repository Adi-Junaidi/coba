<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrasiKegiatanController;
use App\Http\Controllers\RegistrasiPikrController;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/', fn () => redirect('/dashboard'));

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('guest');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::resource('/pembina', PembinaController::class)->only(['index', 'show'])->middleware('auth');
Route::resource('/pembina', PembinaController::class)->middleware('auth');

Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/pembina/', [PembinaController::class, 'api']);

Route::resource('/registrasi-pikr', RegistrasiPikrController::class)->only(['index'])->middleware('auth');
Route::resource('/registrasi-kegiatan', RegistrasiKegiatanController::class)->only(['index'])->middleware('auth');
