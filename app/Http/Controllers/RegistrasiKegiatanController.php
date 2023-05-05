<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Desa;
use App\Models\Pikr;
use App\Models\Point;
use App\Models\Kabkota;
use App\Models\Laporan;
use App\Models\Pembina;
use App\Models\Kecamatan;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\PelayananInformasi;
use App\Models\Pembagi;
use App\Models\Result;

class RegistrasiKegiatanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    $status = Pembina::find(\auth()->user()->pembina->id)->desa->kecamatan->id;
    $kecamatan = Kecamatan::find($status)->desa;
    $pikr_s = [];

    foreach ($kecamatan as $k) {
      array_push($pikr_s, $k->pikr->toArray());
    }

    $pikr_s = \array_merge(...$pikr_s);

    $pikr_id = [];
    foreach ($pikr_s as $pikr) {
      \array_push($pikr_id, $pikr['id']);
    }

    $bulan = [
      1 => 'Januari',
      2 => 'Februari',
      3 => 'Maret',
      4 => 'April',
      5 => 'Mei',
      6 => 'Juni',
      7 => 'Juli',
      8 => 'Agustus',
      9 => 'September',
      10 => 'Oktober',
      11 => 'November',
      12 => 'Desember'
    ];

    return view('registrasi.index', [
      "reports" => Laporan::whereIn('pikr_id', $pikr_id)->where('status', 'Submited')->get(),
      "desa" => Desa::all(),
      "kabkota" => Kabkota::all(),
      'bulan' => $bulan,
      'laporan' => Laporan::all(),
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show(Laporan $registrasi_kegiatan)
  {

    return view('registrasi.show', [
      'pelayanan_s' => $registrasi_kegiatan->pelayananInformasi()->get(),
      'ki_s' => $registrasi_kegiatan->konseling()->get(),
      'kk_s' => $registrasi_kegiatan->konselingKelompok()->get(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Laporan $registrasi_kegiatan)
  {

    $point = $this->countPoint($registrasi_kegiatan);

    if (!$this->setResult($point, $registrasi_kegiatan)) {
      return \redirect()->back()->with('fail', 'Gagal melakukan verifikasi register kegiatan PIK-R');
    };

    $registrasi_kegiatan->update(['status' => 'Verified']);
    $nama_pikr = $registrasi_kegiatan->pikr->nama;
    
    $dataEmail = [
      'receiver' => $registrasi_kegiatan->pikr->user->email,
      'title' => 'Verifikasi PIKR Berhasil',
      'body' => "Akun $nama_pikr sudah bisa login"
    ];

    $send_email = new MailController();
    $send_email->sendEmail($dataEmail);

    return \redirect()->back()->with('success', 'Berhasil melakukan verifikasi register kegiatan PIK-R');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    //
  }


  protected function countPoint($registrasi_kegiatan)
  {
    if (Point::where('laporan_id', $registrasi_kegiatan->id)->first() == null) {
      Point::create([
        'laporan_id' => $registrasi_kegiatan->id,
      ]);
    }

    $point = $registrasi_kegiatan->point()->first()->toArray();
    $point = Arr::except($point, ['id', 'created_at', 'updated_at']);

    $pelayanan_s = $registrasi_kegiatan->pelayananInformasi()->get();

    if ($pelayanan_s != null) {
      foreach ($pelayanan_s as $pelayanan) {

        if ($pelayanan->materi_id != 0) {
          $point['materi_pelayanan'] += 2;
        } else {
          $point['materi_pelayanan'] += 1;
        }

        if ($pelayanan->jabatan_narsum != 'Lainnya') {
          $point['narasumber_pelayanan'] += 2;
        } else {
          $point['narasumber_pelayanan'] += 1;
        }

        $point['peserta_pelayanan'] += $pelayanan->jumlah_peserta;
      }

      $jumlah_peserta = 0;

      if ($point['peserta_pelayanan'] > 500) {
        $jumlah_peserta = 5;
      } else if ($point['peserta_pelayanan'] > 300) {
        $jumlah_peserta = 4;
      } else if ($point['peserta_pelayanan'] > 150) {
        $jumlah_peserta = 3;
      } else if ($point['peserta_pelayanan'] > 50) {
        $jumlah_peserta = 2;
      } else {
        $jumlah_peserta = 1;
      }

      $point['peserta_pelayanan'] = $jumlah_peserta;
    }


    $ki_s = $registrasi_kegiatan->konseling()->get();
    if ($ki_s != null) {
      foreach ($ki_s as $ki) {

        if ($ki->materi_id != 0) {
          $point['materi_ki'] += 2;
        } else {
          $point['materi_ki'] += 1;
        }

        $point['peserta_ki'] += $ki->jumlah_cowok + $ki->jumlah_cewek;
      }

      $jumlah_peserta = 0;

      if ($point['peserta_ki'] > 500) {
        $jumlah_peserta = 5;
      } else if ($point['peserta_ki'] > 300) {
        $jumlah_peserta = 4;
      } else if ($point['peserta_ki'] > 150) {
        $jumlah_peserta = 3;
      } else if ($point['peserta_ki'] > 50) {
        $jumlah_peserta = 2;
      } else {
        $jumlah_peserta = 1;
      }

      $point['peserta_ki'] = $jumlah_peserta;
    }

    $kk_s = $registrasi_kegiatan->konselingKelompok()->get();
    if ($kk_s != null) {
      foreach ($kk_s as $kk) {
        if ($kk->materi_id != 0) {
          $point['materi_kk'] += 2;
        } else {
          $point['materi_kk'] += 1;
        }

        $point['peserta_kk'] += $kk->jumlah_cowok + $kk->jumlah_cewek;
      }

      $jumlah_peserta = 0;

      if ($point['peserta_kk'] > 500) {
        $jumlah_peserta = 5;
      } else if ($point['peserta_kk'] > 300) {
        $jumlah_peserta = 4;
      } else if ($point['peserta_kk'] > 150) {
        $jumlah_peserta = 3;
      } else if ($point['peserta_kk'] > 50) {
        $jumlah_peserta = 2;
      } else {
        $jumlah_peserta = 1;
      }

      $point['peserta_kk'] = $jumlah_peserta;
    }
    
    $bulanTahun = "$registrasi_kegiatan->bulan_lapor-$registrasi_kegiatan->tahun_lapor";
    $jumlah_artikel = Article::where(['pikr_id' => $registrasi_kegiatan->pikr->id, 'bulan_tahun' => $bulanTahun])->count();
    
    $point_artikel = 0;
    
    if ($jumlah_artikel > 25) {
      $point_artikel = 5;
    } else if ($jumlah_artikel > 15) {
      $point_artikel = 4;
    } else if ($jumlah_artikel > 8) {
      $point_artikel = 3;
    } else if ($jumlah_artikel > 3) {
      $point_artikel = 2;
    } else {
      $point_artikel = 1;
    }

    $point['artikel'] = $point_artikel;

    return $point;
  }

  protected function setResult($point, $registrasi_kegiatan)
  {
    $bulanTahun = "$registrasi_kegiatan->bulan_lapor-$registrasi_kegiatan->tahun_lapor";

    $pembagi = [
      'materi_pelayanan' => 2,
      'narasumber_pelayanan' => 2,
      "peserta_pelayanan" => 5,
      "materi_ki" => 2,
      "peserta_ki" => 5,
      "materi_kk" => 2,
      "peserta_kk" => 5,
      "artikel" => 5,
    ];

    $bobot = [
      'materi_pelayanan' => 0.05,
      'narasumber_pelayanan' => 0.05,
      "peserta_pelayanan" => 0.3,
      "materi_ki" => 0.05,
      "peserta_ki" => 0.1,
      "materi_kk" => 0.05,
      "peserta_kk" => 0.25,
      "artikel" => 0.2,
    ];

    $normalisasi = [];

    foreach($pembagi as $key => $value){
      $normalisasi[$key] = $point[$key] / $pembagi[$key];
    }

    $result = 0;

    foreach($normalisasi as $key => $value){
      $result += $normalisasi[$key] * $bobot[$key];
    }

    Result::create([
      'pikr_id' => $registrasi_kegiatan->pikr->id,
      'bulan_tahun' => $bulanTahun,
      'point' => $result,
    ]);

    return true;
    
  }
}
