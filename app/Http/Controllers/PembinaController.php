<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Jabatan;
use App\Models\Kabkota;
use App\Models\Pembina;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('pembina', [
      "title" => "Data Pembina",
      "provinsi" => Provinsi::find(1),
      "kabkota" => Kabkota::all(),
      "desa" => Desa::all(),
      "jabatans" => Jabatan::all(),
      "pembina" => Pembina::all(),
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
    // FIXME: lakukan validasi
    $desa = Desa::find($request->desaId);
    $kecamatan = $desa->kecamatan;
    $kabkota = $kecamatan->kabkota;
    $provinsi = $kabkota->provinsi;

    $kodeJabatan = Jabatan::find($request->jabatanId)->kode;
    $kodeProvinsi = $provinsi->kode;
    $kodeKabKot = $kabkota->kode;
    $kodeKecamatan = $kecamatan->kode;
    $nomorUrut = '01';

    $noRegister = $kodeProvinsi . $kodeKabKot . $kodeKecamatan . $kodeJabatan . $nomorUrut;
    Pembina::create([
      "no_register" => $noRegister,
      "nama" => $request->nama,
      "no_urut" => $nomorUrut,
      "jabatan_id" => $request->jabatanId,
      "desa_id" => $request->desaId
    ]);

    return response()->json([
      'nomor_urut' => $kecamatan->toJson(),
      'status' => 'success',
      'message' => 'Berhasil menambah pembina'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function show(Request $request)
  {
    // if ($request->ajax()) {
    $keyword = $request->keyword;
    $desaId = $request->desa;

    $pembina = Pembina::when($desaId, function ($q, $desaId) {
      $q->where('desa_id', $desaId);
    })->when($keyword, function ($q, $keyword) {
      $q->where("nama", "LIKE", "%" . $keyword . "%")
        ->orWhere("no_register", "LIKE", "%" . $keyword . "%");
    })
      // ->get();
      ->paginate(10);

    $count = count($pembina);

    return ($count != 0)
      ? view('partials.table-pembina', ["pembina" => $pembina])
      : '<tr><th colspan="5" class="text-center">Maaf data tidak ditemukan</th></tr>';
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function edit(Pembina $pembina)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Pembina $pembina)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pembina $pembina)
  {
    $nama = $pembina->nama;
    $pembina->delete();
    return back()->with('success', 'Berhasil menghapus data pembina ' . $nama);
  }

  public function api(Request $request)
  {
    if ($request->ajax()) {
      $keyword = $request->keyword;
      $desaId = $request->desa;

      $pembinas = Pembina::when($desaId, function ($q, $desaId) {
        $q->where('desa_id', $desaId);
      })->when($keyword, function ($q, $keyword) {
        $q->where("nama", "LIKE", "%" . $keyword . "%")
          ->orWhere("no_register", "LIKE", "%" . $keyword . "%");
      })
        ->get();

      return ($pembinas->count() != 0)
        ? response()->json($pembinas)
        : response()->json(['error' => 'Pembina tidak ditemukan']);
    }
  }
}
