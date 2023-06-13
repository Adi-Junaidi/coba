<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Pikr;
use App\Models\Point;
use App\Models\Result;
use App\Models\Article;
use App\Models\Kabkota;
use App\Models\Laporan;
use App\Models\Pembagi;
use App\Models\Pembina;
use App\Models\Criteria;
use App\Models\Kecamatan;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PelayananInformasi;

class RegistrasiKegiatanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {

    return view('registrasi.index', [
      "pikrs" => Pikr::allVerified(),
    ]);
  }

  public function show_register(Pikr $pikr)
  {

    return view('registrasi.show_register', [
      "reports" => $pikr->laporan()->get(),
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

    // Proses input poin ke db points
    $point = $this->setPoint($registrasi_kegiatan);

    if (!$this->setResult($point)) {
      return \redirect()->back()->with('fail', 'Gagal melakukan verifikasi data laporan PIK-R');
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

    return \redirect()->back()->with('success', 'Berhasil melakukan verifikasi data laporan PIK-R');
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



  protected function setPoint($registrasi_kegiatan)
  {
    $bulan_tahun = sprintf("%s-%s", $registrasi_kegiatan->bulan_lapor, $registrasi_kegiatan->tahun_lapor);
    foreach (Criteria::all() as $criteria) {
      $point = 0;

      switch (strtolower($criteria->nama)) {
        case 'materi pelayanan informasi':
          foreach ($registrasi_kegiatan->pelayananInformasi as $kegiatan) {
            if ($kegiatan->materi_lainnya == null) {
              $point += 2;
            } else {
              $point += 1;
            }
          }
          break;

        case 'narasumber pelayanan informasi':
          foreach ($registrasi_kegiatan->pelayananInformasi as $kegiatan) {
            if ($kegiatan->jabatan_narsum == "Lainnya") {
              $point += 1;
            } else {
              $point += 2;
            }
          }
          break;

        case 'peserta pelayanan informasi':
          foreach ($registrasi_kegiatan->pelayananInformasi as $kegiatan) {
            $point += $kegiatan->jumlah_peserta;
          }
          break;

        case 'materi konseling individu':
          foreach ($registrasi_kegiatan->konseling as $kegiatan) {
            if ($kegiatan->materi_id == 0) {
              $point += 1;
            } else {
              $point += 2;
            }
          }
          break;

        case 'peserta konseling individu':
          foreach ($registrasi_kegiatan->konseling as $kegiatan) {
            $jumlah_peserta = $kegiatan->jumlah_cowok + $kegiatan->jumlah_cewek;
            $point += $jumlah_peserta;
          }
          break;

        case 'materi konseling kelompok':
          foreach ($registrasi_kegiatan->konselingKelompok as $kegiatan) {
            if ($kegiatan->materi_id == 0) {
              $point += 1;
            } else {
              $point += 2;
            }
          }
          break;

        case 'peserta konseling kelompok':
          foreach ($registrasi_kegiatan->konselingKelompok as $kegiatan) {
            $jumlah_peserta = $kegiatan->jumlah_cowok + $kegiatan->jumlah_cewek;
            $point += $jumlah_peserta;
          }
          break;

        case 'artikel':
          $articles = Article::where('pikr_id', $registrasi_kegiatan->pikr->id)->where('bulan_tahun',  $bulan_tahun)->get();
          $point += $articles->count();
          break;

        default:
          break;
      }

      Point::create([
        'pikr_id' => $registrasi_kegiatan->pikr->id,
        'criteria_id' => $criteria->id,
        'bulan_tahun' => $bulan_tahun,
        'point' => $point,
      ]);
    }

    $data = [
      'pikr_id' => $registrasi_kegiatan->pikr->id,
      'bulan_tahun' => $bulan_tahun,
    ];

    $criterias = $registrasi_kegiatan->pikr->points()->get();

    foreach ($criterias as $criteria) {
      $data[Str::slug($criteria->criteria->nama, '_')] = $criteria->point;
    }

    return $data;
  }

  protected function setResult($data)
  {
    // Membuat data result sebagai inisiasi awal dari laporan yang dimasukkan
    Result::create([
      'pikr_id' => $data['pikr_id'],
      'bulan_tahun' => $data['bulan_tahun'],
      'point' => 0,
    ]);

    // Menentukan pembagi tiap criteria berdasarkan bulan_tahun laporan yang dimasukkan
    $pembagi = [
      'criteria_1' => Point::where('criteria_id', 1)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_2' => Point::where('criteria_id', 2)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_3' => Point::where('criteria_id', 3)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_4' => Point::where('criteria_id', 4)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_5' => Point::where('criteria_id', 5)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_6' => Point::where('criteria_id', 6)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_7' => Point::where('criteria_id', 7)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
      'criteria_8' => Point::where('criteria_id', 8)->where('bulan_tahun', $data['bulan_tahun'])->max('point'),
    ];


    // Mengambil pikr yang sudah memasukkan laporan
    $pikr_id = Point::where('bulan_tahun', $data['bulan_tahun'])->pluck('pikr_id')->unique()->values()->toArray();
    // dd($pikr_id);

    for ($i = 0; $i < count($pikr_id); $i++) {
      $point = Point::where('pikr_id', $pikr_id[$i])->where('bulan_tahun', $data['bulan_tahun'])->get();
      $normalisasi = [];

      foreach ($point as $p) {
        if ($p->criteria->id == 1 && $pembagi['criteria_1'] != 0.00) {
          $normalisasi[0] = $p->point / $pembagi['criteria_1'];
        } elseif ($p->criteria->id == 2 && $pembagi['criteria_2'] != 0.00) {
          $normalisasi[1] = $p->point / $pembagi['criteria_2'];
        } elseif ($p->criteria->id == 3 && $pembagi['criteria_3'] != 0.00) {
          $normalisasi[2] = $p->point / $pembagi['criteria_3'];
        } elseif ($p->criteria->id == 4 && $pembagi['criteria_4'] != 0.00) {
          $normalisasi[3] = $p->point / $pembagi['criteria_4'];
        } elseif ($p->criteria->id == 5 && $pembagi['criteria_5'] != 0.00) {
          $normalisasi[4] = $p->point / $pembagi['criteria_5'];
        } elseif ($p->criteria->id == 6 && $pembagi['criteria_6'] != 0.00) {
          $normalisasi[5] = $p->point / $pembagi['criteria_6'];
        } elseif ($p->criteria->id == 7 && $pembagi['criteria_7'] != 0.00) {
          $normalisasi[6] = $p->point / $pembagi['criteria_7'];
        } elseif ($p->criteria->id == 8 && $pembagi['criteria_8'] != 0.00) {
          $normalisasi[7] = $p->point / $pembagi['criteria_8'];
        }
      }

      $hasil = 0;

      foreach ($point as $keys => $p) {
        if (\array_key_exists($keys, $normalisasi)) {
          $hasil += $p->criteria->normalisasi * $normalisasi[$keys];
        }
      }

      Result::where('pikr_id', $pikr_id[$i])->where('bulan_tahun', $data['bulan_tahun'])->update([
        'point' => $hasil,
      ]);
    }

    return true;
  }
}
