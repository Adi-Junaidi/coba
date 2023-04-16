<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Pikr;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Laporan;
use App\Models\PelayananInformasi;
use App\Models\Pembina;
use Illuminate\Http\Request;

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

    foreach($kecamatan as $k){
      array_push($pikr_s, $k->pikr->toArray());
    }

    $pikr_s = \array_merge(...$pikr_s);
    
    $pikr_id = [];
    foreach ($pikr_s as $pikr){
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
    $registrasi_kegiatan->update(['status' => 'Verified']);
    

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

}
