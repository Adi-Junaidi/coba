<?php

use App\Models\Kabkota;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPikrController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PikrController;
use App\Http\Controllers\RegistrasiKegiatanController;

Route::get('/', fn () => redirect('/dashboard'));

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/pembina', PembinaController::class)->middleware('auth');
Route::resource('/pikr', PikrController::class)->middleware('auth');

Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/desa/{desa}', [DesaController::class, 'api']);
Route::get('/api/pembina/', [PembinaController::class, 'api']);
Route::get('/api/pikr', [PikrController::class, 'api']);

Route::resource('/registrasi-kegiatan', RegistrasiKegiatanController::class)->middleware('auth');


Route::get('/up/dashboard', [UserPikrController::class, 'dashboard']);
Route::get('/up/biodata/identitas', [UserPikrController::class, 'b_identitas']);
Route::get('/up/biodata/informasi', [UserPikrController::class, 'b_informasi']);
Route::get('/up/biodata/ketersediaan', [UserPikrController::class, 'b_ketersediaan']);
Route::get('/up/biodata/mitra', [UserPikrController::class, 'b_mitra']);
Route::get('/up/biodata/pengurus', [UserPikrController::class, 'b_pengurus']);
