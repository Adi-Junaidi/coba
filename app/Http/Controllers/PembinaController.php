<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kabkota;
use App\Models\Kecamatan;
use App\Models\Pembina;
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
      "pembina" => Pembina::paginate(10),
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
    //
  }
}
