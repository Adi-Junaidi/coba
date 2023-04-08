<?php

use App\Models\Kabkota;
use App\Models\Kecamatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SaranaController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserPikrController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MitraPikrController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\PikrController;
use App\Http\Controllers\RegistrasiKegiatanController;
use App\Http\Controllers\SkController;

Route::get('/', function () {
    if(auth()->user()->isPikr()){
        return redirect('/up/dashboard');
    }else{
        return redirect('/dashboard');
    }
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/main', function () {
    return view('/main');
})->middleware('auth');


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/pembina', PembinaController::class)->middleware('auth');
Route::resource('/pikr', PikrController::class)->middleware('auth');


Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/desa/{desa}', [DesaController::class, 'api']);
Route::get('/api/pembina/', [PembinaController::class, 'api']);
Route::get('/api/pikr', [PikrController::class, 'api']);

Route::resource('/registrasi-kegiatan', RegistrasiKegiatanController::class)->middleware('auth');

Route::middleware('stepCheck')->group(function () {
    Route::get('/up/dashboard', [UserPikrController::class, 'dashboard']);
    Route::get('/up/data/identitas', [UserPikrController::class, 'b_identitas']);
    Route::get('/up/data/informasi', [UserPikrController::class, 'b_informasi']);
    Route::post('/up/data/informasi', [UserPikrController::class, 's_informasi']);
    Route::post('/up/data/mitra/{id}', [MitraPikrController::class, 'update']);
    Route::post('/up/data/sk/{id}', [UserPikrController::class, 'addSk']);
    Route::post('/up/data/update_sk', [UserPikrController::class, 'updateSk']);
    Route::resources([
        '/up/data/materi' => MateriController::class,
        '/up/data/sarana' => SaranaController::class,
        '/up/data/mitra' => MitraPikrController::class,
        '/up/data/pengurus' => PengurusController::class,
    ]);
});

