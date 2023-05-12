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

  public function tahunan_a()
  {
    $kabkotas = Kabkota::withPikrs();

    $downloadLinks = [
      "xlsx" => '/laporan/tahunan/export/12a/xlsx',
      "pdf" => '/laporan/tahunan/export/12a/pdf',
    ];

    return view('laporan.12a', compact('kabkotas', 'downloadLinks'));
  }

  public function tahunan_b()
  {
    $kabkotas = Kabkota::withPikrs();

    $downloadLinks = [
      "xlsx" => '/laporan/tahunan/export/12b/xlsx',
      "pdf" => '/laporan/tahunan/export/12b/pdf',
    ];

    return view('laporan.12b', compact('kabkotas', 'downloadLinks'));
  }

  public function bulanan_a(Request $request)
  {
    $kabkotas = Kabkota::withPikrs();

    $currentMonth = date('m');
    $filters = [
      "kabkota_id" => $request->kb,
      "kecamatan_id" => $request->kc,
      "bulan" => $request->b ? $request->b : $currentMonth,
      "tahun" => $request->t
    ];

    return view('laporan.7a', compact('kabkotas', 'filters'));
  }


  // Export Excel
  public function export_12a_xlsx()
  {
    return Excel::download(new Laporan12aExport, 'JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN TAHUN 2023.xlsx');
  }
  public function export_12b_xlsx()
  {
    return Excel::download(new Laporan12bExport, 'JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA (PIK REMAJA) BERDASARKAN MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI SERTA PENDIDIK DAN KONSELOR SEBAYA TAHUN 2023.xlsx');
  }

  // export pdf
  public function export_12a_pdf()
  {
    return Excel::download(new Laporan12aExport, 'JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA BERDASARKAN IDENTITAS DAN INFORMASI KELOMPOK KEGIATAN TAHUN 2023.pdf', \Maatwebsite\Excel\Excel::MPDF);
  }
  public function export_12b_pdf()
  {
    return Excel::download(new Laporan12bExport, 'JUMLAH PUSAT INFORMASI DAN KONSELING REMAJA (PIK REMAJA) BERDASARKAN MATERI, SARANA DAN KEMITRAAN YANG DIMILIKI SERTA PENDIDIK DAN KONSELOR SEBAYA TAHUN 2023.pdf', \Maatwebsite\Excel\Excel::MPDF);
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
