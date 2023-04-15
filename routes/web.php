<?php

use App\Http\Controllers\ArticleController;
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
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\KonselingKelompokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelayananInformasiController;
use App\Http\Controllers\PikrController;
use App\Http\Controllers\RegistrasiKegiatanController;

use App\Models\Article;

Route::get('/', function () {
  if (auth()->guest()) {
    return redirect('/home');
  } else if (auth()->user()->isPikr()) {
    return redirect('/up/dashboard');
  } else {
    return redirect('/dashboard');
  }
});

Route::get('/home', function () {
  return view('landing.home', [
    'articles' => Article::orderBy('updated_at', 'desc')->get()
  ]);
})->middleware('guest');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

// Landing
Route::get('/articles', [ArticleController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'showAll']);
Route::get('/articles/{article}', [ArticleController::class, 'show']);
Route::get('/leaderboard', function () {
  return view('landing.leaderboard');
});


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/pembina', PembinaController::class)->middleware('auth');
Route::resource('/pikr', PikrController::class)->middleware('auth');
Route::post('/pikr/{pikr}/verify', [PikrController::class, 'verify'])->middleware('auth');


Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/desa/{desa}', [DesaController::class, 'api']);
Route::get('/api/pembina/', [PembinaController::class, 'api']);
Route::get('/api/pikr', [PikrController::class, 'api']);

Route::resource('/registrasi-kegiatan', RegistrasiKegiatanController::class)->middleware('auth');

Route::middleware('stepCheck', 'auth')->group(function () {
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
    '/up/kegiatan' => LaporanController::class,
    '/up/article' => ArticleController::class,
    '/kegiatan/pelayanan' => PelayananInformasiController::class,
    '/kegiatan/konseling/individu' => KonselingController::class,
    '/kegiatan/konseling/kelompok' => KonselingKelompokController::class,
  ]);

  Route::get('/utility/check-slug', [ArticleController::class, 'checkSlug']);
  Route::get('/utility/getPendidikSebaya', [PelayananInformasiController::class, 'getPendidikSebaya']);
  Route::get('/utility/getKonselorSebaya', [PelayananInformasiController::class, 'getKonselorSebaya']);
  Route::get('/utility/getPLKB', [PelayananInformasiController::class, 'getPLKB']);
});
