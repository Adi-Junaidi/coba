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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KonselingController;
use App\Http\Controllers\KonselingKelompokController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelayananInformasiController;
use App\Http\Controllers\PikrController;
use App\Http\Controllers\RankController;
use App\Http\Controllers\RegistrasiKegiatanController;
use App\Http\Controllers\ValidationController;
use App\Models\Article;

Route::get('/', function () {
  if (auth()->guest()) {
    return redirect('/home');
  } elseif (auth()->user()->isPikr()) {
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

// Dashboard
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index']);
  Route::resource('/pembina', PembinaController::class);
  Route::resource('/pikr', PikrController::class);
  Route::post('/pikr/{pikr}/verify', [PikrController::class, 'verify']);
  Route::prefix('laporan')->group(function () {
    Route::prefix('tahunan')->group(function () {
      Route::get('/12a', [LaporanController::class, 'tahunan_a']);
      Route::get('/12b', [LaporanController::class, 'tahunan_b']);

      Route::prefix('export')->group(function () {
        Route::prefix('12a')->group(function () {
          Route::get('/xlsx', [LaporanController::class, 'export_12a_xlsx']);
          Route::get('/pdf', [LaporanController::class, 'export_12a_pdf']);
        });

        Route::prefix('12b')->group(function () {
          Route::get('/xlsx', [LaporanController::class, 'export_12b_xlsx']);
          Route::get('/pdf', [LaporanController::class, 'export_12b_pdf']);
        });
      });
    });
  });
});

Route::get('/api/kabkota/{kabkota}/kecamatans', fn (Kabkota $kabkota) => response()->json($kabkota->kecamatan));
Route::get('/api/kecamatan/{kecamatan}/desas', fn (Kecamatan $kecamatan) => response()->json($kecamatan->desa));
Route::get('/api/desa/{desa}', [DesaController::class, 'api']);
Route::get('/api/pembina/', [PembinaController::class, 'api']);
Route::get('/api/pikr', [PikrController::class, 'api']);

Route::middleware('auth')->group(function () {
  Route::resources([
    '/up/article' => ArticleController::class,
    '/registrasi-kegiatan' => RegistrasiKegiatanController::class,
    '/peringkat' => RankController::class,
  ]);

  Route::get('/utility/getArticle/{article}', [ArticleController::class, 'getArticle']);
});

Route::get('/validate/pikr', [ValidationController::class, 'validatePikr'])->middleware('auth');
Route::get('/validate/kegiatan', [ValidationController::class, 'validateKegiatan'])->middleware('auth');
Route::post('/peringkat/filter', [RankController::class, 'filter'])->middleware('auth');

Route::middleware('stepCheck', 'auth',)->group(function () {

  Route::get('/up/dashboard', [UserPikrController::class, 'dashboard']);
  Route::get('/up/data/identitas', [UserPikrController::class, 'b_identitas']);
  Route::post('/up/data/identitas/{pikr}', [UserPikrController::class, 'updateIdentitas']);
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
  Route::middleware('pengurusCheck')->group(function () {
    Route::resources([
      '/up/kegiatan' => LaporanController::class,
      '/kegiatan/pelayanan' => PelayananInformasiController::class,
      '/kegiatan/konseling/individu' => KonselingController::class,
      '/kegiatan/konseling/kelompok' => KonselingKelompokController::class,
    ]);
    Route::get('/up/kegiatan/detail/{laporan}', [LaporanController::class, 'detail']);
  });
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);
