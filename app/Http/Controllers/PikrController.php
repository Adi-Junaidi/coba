<?php

namespace App\Http\Controllers;

use App\Models\Pikr;
use App\Http\Requests\StorePikrRequest;
use App\Http\Requests\UpdatePikrRequest;
use App\Models\Desa;
use App\Models\Kabkota;
use App\Models\Materi;
use App\Models\Pembina;
use App\Models\Sarana;
use Illuminate\Http\Request;

class PikrController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pikr.index', [
      "pikr" => Pikr::all(),
      "desa" => Desa::all(),
      "kabkota" => Kabkota::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('pikr.create', [
      'kabkota' => Kabkota::all(),
      'pembinas' => Pembina::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePikrRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePikrRequest $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function show(Pikr $pikr)
  {
    return \view('pikr.detail', [
      'pikr_info' => $pikr,
      'materi' => Materi::all(),
      'materi_pikr' => $pikr->materi()->first(),
      'sarana' => Sarana::all(),
      'sarana_pikr' => $pikr->sarana()->first(),
      'mitra_s' => $pikr->mitra()->get(),
      'pengurus' => $pikr->pengurus()->get(),
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function edit(Pikr $pikr)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePikrRequest  $request
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePikrRequest $request, Pikr $pikr)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pikr $pikr)
  {
    //
  }

  public function verify(Pikr $pikr)
  {
    $this->authorize('verify', $pikr);

    if ($pikr->verified) {
      $pikr->update([
        "verified" => false
      ]);

      return back()->with('error', "Berhasil membatalkan verifikasi PIK-R {$pikr->nama}");
    }

    $pikr->update([
      "verified" => true
    ]);
    

    return back()->with('success', "PIK-R {$pikr->nama} berhasil diverifikasi");
  }

  public function api(Request $request)
  {
    if ($request->ajax()) {
      $desaId = $request->desa;
      $desa = Desa::find($desaId);

      $pikrs = Pikr::where('desa_id', $desaId)->get();

      return ($pikrs->count() !== 0)
        ? response()->json([
          'pikrs' => $pikrs->map(function ($pikr) {
            return [
              ...$pikr->toArray(),
              'pembina' => $pikr->pembina,
              'sk' => $pikr->sk
            ];
          }),
          'desa' => $desa,
          'kecamatan' => $desa->kecamatan,
          'kabkota' => $desa->kecamatan->kabkota,
          'provinsi' => $desa->kecamatan->kabkota->provinsi
        ])
        : response()->json(['error' => 'PIK-R tidak ditemukan']);
    }
  }
}
