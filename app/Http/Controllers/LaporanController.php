<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Laporan;
use App\Models\Pembina;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLaporanRequest;
use App\Http\Requests\UpdateLaporanRequest;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Konseling;
use App\Models\KonselingKelompok;
use App\Models\PelayananInformasi;
use App\Models\Pikr;

use App\Exports\Laporan12aExport;
use App\Exports\Laporan12bExport;
use App\Exports\Laporan7aExport;
use App\Exports\Laporan7bExport;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */


  public function index()
  {
    $bulan = array(
      array('value' => '01', 'nama' => 'Januari'),
      array('value' => '02', 'nama' => 'Februari'),
      array('value' => '03', 'nama' => 'Maret'),
      array('value' => '04', 'nama' => 'April'),
      array('value' => '05', 'nama' => 'Mei'),
      array('value' => '06', 'nama' => 'Juni'),
      array('value' => '07', 'nama' => 'Juli'),
      array('value' => '08', 'nama' => 'Agustus'),
      array('value' => '09', 'nama' => 'September'),
      array('value' => '10', 'nama' => 'Oktober'),
      array('value' => '11', 'nama' => 'November'),
      array('value' => '12', 'nama' => 'Desember')
    );

    $tahunIni = Laporan::where('pikr_id', \session('pikr_id'))->where('tahun_lapor', \date('Y'))->pluck('bulan_lapor')->toArray();
    $tahunKemarin = Laporan::where('pikr_id', \session('pikr_id'))->where('tahun_lapor', \date('Y') - 1)->pluck('bulan_lapor')->toArray();

    $data = [
      'title' => "Register Kegiatan",
      'bulan' => $bulan,
      'tahunIni' => $tahunIni,
      'tahunKemarin' => $tahunKemarin,
      'laporan_s' => Laporan::where('pikr_id', \session('pikr_id'))->orderBy('bulan_lapor', 'asc')->get(),
      'materi_s' => Materi::all(),
      'pikr' => Pikr::find(\auth()->user()->pikr->id),
      'ketua_info' => Pengurus::where('jabatan', 'Ketua')->first()
    ];

    return \view('user-pikr/kegiatan/index', $data);
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
   * @param  \App\Http\Requests\StoreLaporanRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;
    $validateData =  $request->validate([
      'bulan_lapor' => 'required',
      'tahun_lapor' => 'required',
    ]);

    $validateData['pikr_id'] = \session('pikr_id');

    Laporan::create($validateData);

    return \redirect('/up/kegiatan')->with('success', 'Laporan berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Laporan  $laporan
   * @return \Illuminate\Http\Response
   */
  public function show(Laporan $kegiatan)
  {
    if (\session('pikr_id') != $kegiatan->pikr_id) abort(403);
    if ($kegiatan->status != "Not Submited") abort(403);

    $materi_s = Materi::all();
    $pembina_s = Pembina::all()->pluck('nama');
    $narsum = [
      'PKB/PLKB',
      'Pendidik Sebaya',
      'Konselor Sebaya',
    ];

    $data = [
      'title' => 'Tambah Kegiatan',
      'materi_s' => $materi_s,
      'pembina_s' => $pembina_s,
      'narsum' => $narsum,
      'laporan' => $kegiatan,
      'konseb_s' => Pengurus::where('jabatan', 'Konselor Sebaya')->get(),
      'pelayanan_s' => PelayananInformasi::where('laporan_id', $kegiatan->id)->get(),
      'ki_s' => Konseling::where('laporan_id', $kegiatan->id)->get(),
      'kk_s' => KonselingKelompok::where('laporan_id', $kegiatan->id)->get(),
    ];

    return \view('user-pikr/kegiatan/create', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Laporan  $laporan
   * @return \Illuminate\Http\Response
   */
  public function edit(Laporan $laporan)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateLaporanRequest  $request
   * @param  \App\Models\Laporan  $laporan
   * @return \Illuminate\Http\Response
   */
  public function update(Laporan $kegiatan)
  {
    $kegiatan->update(['status' => 'Submited']);
    return \redirect()->back()->with('success', 'Data berhasil disubmit, silahkan menunggu konfirmasi lanjutan');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Laporan  $laporan
   * @return \Illuminate\Http\Response
   */
  public function destroy(Laporan $laporan)
  {
    //
  }

  private function filterTahunan(Request $request)
  {
    $filters = [
      'kabkota_id' => $request->kb,
      'kecamatan_id' => $request->kc,
      'tahun' => $request->t ?? date('Y')
    ];

    $kabkotas = Kabkota::all();
    $kecamatan = null;
    $kabkota = null;
    $areas = $kabkotas;
    if ($filters['kabkota_id']) {
      $kabkota = Kabkota::find($filters['kabkota_id']);
      $areas = $kabkota->kecamatan;

      if ($filters['kecamatan_id']) {
        $kecamatan = Kecamatan::find($filters['kecamatan_id']);
        $areas = $kecamatan->desa;
      }
    }

    return compact('kabkotas', 'kabkota', 'kecamatan', 'filters', 'areas');
  }

  public function tahunan_a(Request $request)
  {
    if (!auth()->user->isAdmin) {
      return back()->with('error', 'Anda tidak berwenang mengakses halaman ini');
    }

    $this->authorize('viewAny', Laporan::class);

    $data = $this->filterTahunan($request);
    $kabkota = $data['kabkota'];
    $kecamatan = $data['kecamatan'];
    $filters = $data['filters'];
    $areas = $data['areas'];

    switch ($request->export) {
      case 'xslx':
        return Excel::download(new Laporan12aExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN TAHUN $filters[tahun].xlsx");

      case 'pdf':
        return Excel::download(new Laporan12aExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN TAHUN $filters[tahun].pdf", \Maatwebsite\Excel\Excel::MPDF);

      default:
        return view('laporan.12a', $data);
    }
  }

  public function tahunan_b(Request $request)
  {
    if (!auth()->user->isAdmin) {
      return back()->with('error', 'Anda tidak berwenang mengakses halaman ini');
    }

    $this->authorize('viewAny', Laporan::class);

    $data = $this->filterTahunan($request);
    $kabkota = $data['kabkota'];
    $kecamatan = $data['kecamatan'];
    $filters = $data['filters'];
    $areas = $data['areas'];

    switch ($request->export) {
      case 'xslx':
        return Excel::download(new Laporan12bExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA (PIK REMAJA) BERDASARKAN MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI SERTA PENDIDIK DAN KONSELOR SEBAYA TAHUN $filters[tahun].xlsx");

      case 'pdf':
        return Excel::download(new Laporan12bExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA (PIK REMAJA) BERDASARKAN MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI SERTA PENDIDIK DAN KONSELOR SEBAYA TAHUN $filters[tahun].pdf", \Maatwebsite\Excel\Excel::MPDF);

      default:
        return view('laporan.12b', $data);
    }
  }

  public function bulanan_a(Request $request)
  {
    if (!auth()->user->isAdmin) {
      return back()->with('error', 'Anda tidak berwenang mengakses halaman ini');
    }

    $this->authorize('viewAny', Laporan::class);

    $filters = [
      "kabkota_id" => $request->kb,
      "kecamatan_id" => $request->kc,
      "bulan" => [
        "kode" => $request->b ?? date('m'),
        "nama" => ""
      ],
      "tahun" => $request->t ?? date('Y')
    ];

    $kabkotas = Kabkota::all();
    $kecamatan = null;
    $kabkota = null;
    $areas = $kabkotas;
    if ($filters['kabkota_id']) {
      $kabkota = Kabkota::find($filters['kabkota_id']);
      $areas = $kabkota->kecamatan;

      if ($filters['kecamatan_id']) {
        $kecamatan = Kecamatan::find($filters['kecamatan_id']);
        $areas = $kecamatan->desa;
      }
    }

    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $filters['bulan']['nama'] = $months[$filters['bulan']['kode'] - 1];

    switch ($request->export) {
      case 'xlsx':
        return Excel::download(new Laporan7aExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA) YANG MELAKUKAN PERTEMUAN DAN REMAJA HADIR PERTEMUAN BULAN {$filters['bulan']['nama']} {$filters['tahun']}.xlsx");

      case 'pdf':
        return Excel::download(new Laporan7aExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA) YANG MELAKUKAN PERTEMUAN DAN REMAJA HADIR PERTEMUAN BULAN {$filters['bulan']['nama']} {$filters['tahun']}.pdf", \Maatwebsite\Excel\Excel::MPDF);

      default:
        return view('laporan.7a', compact('kabkotas', 'kabkota', 'kecamatan', 'filters', 'months', 'areas'));
    }
  }

  public function bulanan_b(Request $request)
  {
    if (!auth()->user->isAdmin) {
      return back()->with('error', 'Anda tidak berwenang mengakses halaman ini');
    }

    $this->authorize('viewAny', Laporan::class);

    $filters = [
      "kabkota_id" => $request->kb,
      "kecamatan_id" => $request->kc,
      "bulan" => [
        "kode" => $request->b ?? date('m'),
        "nama" => ""
      ],
      "tahun" => $request->t ?? date('Y')
    ];

    $kabkotas = Kabkota::all();
    $kecamatan = null;
    $kabkota = null;
    $areas = $kabkotas;
    if ($filters['kabkota_id']) {
      $kabkota = Kabkota::find($filters['kabkota_id']);
      $areas = $kabkota->kecamatan;

      if ($filters['kecamatan_id']) {
        $kecamatan = Kecamatan::find($filters['kecamatan_id']);
        $areas = $kecamatan->desa;
      }
    }

    $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
    $filters['bulan']['nama'] = $months[$filters['bulan']['kode'] - 1];

    switch ($request->export) {
      case 'xlsx':
        return Excel::download(new Laporan7bExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH REMAJA HADIR KONSELING PADA PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA) BULAN {$filters['bulan']['nama']} {$filters['tahun']}.xlsx");

      case 'pdf':
        return Excel::download(new Laporan7bExport($kabkota, $kecamatan, $filters, $areas), "JUMLAH REMAJA HADIR KONSELING PADA PUSAT INFORMASI DAN KONSELING REMAJA DAN MAHASISWA (PIK REMAJA) BULAN {$filters['bulan']['nama']} {$filters['tahun']}.pdf", \Maatwebsite\Excel\Excel::MPDF);

      default:
        return view('laporan.7b', compact('kabkotas', 'kabkota', 'kecamatan', 'filters', 'months', 'areas'));
    }
  }

  public function detail(Laporan $laporan)
    {
        if (\session('pikr_id') != $laporan->pikr_id) abort(403);
        if ($laporan->status == "Not Submited") abort(403);
        
        return view('user-pikr.kegiatan.detail', [
            'pelayanan_s' => $laporan->pelayananInformasi()->get(),
            'ki_s' => $laporan->konseling()->get(),
            'kk_s' => $laporan->konselingKelompok()->get(),
        ]);
    }
    
    public function cancel(Laporan $laporan)
    {
        if (session('pikr_id') != $laporan->pikr_id) abort(403);
        if ($laporan->status != "Submited") abort(403);

        $laporan->update([
            'status' => 'Not Submited',
        ]);

        return  back()->with('success', 'Berhasil membatalkan pengiriman registrasi kegiatan');
    }
}
