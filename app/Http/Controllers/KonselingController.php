<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Http\Requests\StoreKonselingRequest;
use App\Http\Requests\UpdateKonselingRequest;
use Illuminate\Http\Request;

class KonselingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
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
   * @param  \App\Http\Requests\StoreKonselingRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;

    $rules = [
      'tanggal_ki' => 'required',
      'konseb_ki' => 'required',
      'cowok_ki' => 'required',
      'cewek_ki' => 'required',
      'kel1_ki' => 'required',
      'kel2_ki' => 'required',
      'kel3_ki' => 'required',
      'materi_ki' => 'required',
      'dokumentasi_konseling_individu' => 'required|image|file|max:1024'
    ];

    if ($request->materi_ki == "Lainnya") {
      $rules['materi_ki_lainnya'] = 'required';
    }

    $request->validate($rules);

    $jumlah_jk = $request->cowok_ki + $request->cewek_ki;
    $jumlah_kel = $request->kel1_ki + $request->kel2_ki + $request->kel3_ki;

    if ($jumlah_jk !== $jumlah_kel) return \redirect()->back()->withErrors(['fail' => 'Jumlah Peserta Yang Dimasukkan tidak valid']);

    if ($jumlah_jk == 0) return \redirect()->back()->withErrors(['fail' => 'Jumlah Peserta Yang Dimasukkan tidak valid']);

    $storeData = [
      'laporan_id' => $request->laporan_id,
      'materi_id' => $request->materi_ki,
      'pengurus_id' => $request->laporan_id,
      'tanggal' => $request->tanggal_ki,
      'jumlah_cowok' => $request->cowok_ki,
      'jumlah_cewek' => $request->cewek_ki,
      'jumlah_rawal' => $request->kel1_ki,
      'jumlah_rtengah' => $request->kel2_ki,
      'jumlah_rakhir' => $request->kel3_ki,
      'dokumentasi' => $request->file('dokumentasi_konseling_individu')->store('dokumentasi/konseling_individu')
    ];

    if ($request->materi_ki == 'Lainnya') {
      $storeData['materi_id'] = 0;
      $storeData['materi_lainnya'] = $request->materi_ki_lainnya;
    }

    Konseling::create($storeData);

    return \redirect()->back()->with('success', 'Berhasil Menambah Data Konseling Individu Baru');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Konseling  $konseling
   * @return \Illuminate\Http\Response
   */
  public function show(Konseling $konseling)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Konseling  $konseling
   * @return \Illuminate\Http\Response
   */
  public function edit(Konseling $konseling)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateKonselingRequest  $request
   * @param  \App\Models\Konseling  $konseling
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateKonselingRequest $request, Konseling $konseling)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Konseling  $konseling
   * @return \Illuminate\Http\Response
   */
  public function destroy(Konseling $individu)
  {
    $individu->delete();
    return \redirect()->back()->with('success', 'Data berhasil dihapus');
  }
}
