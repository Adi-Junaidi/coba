<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use Illuminate\Routing\Route as RoutingRoute;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/pembina', PembinaController::class)->only(['index', 'show'])->middleware('auth');

Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/pembina/', [PembinaController::class, 'show']);
