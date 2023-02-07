<?php

namespace App\Http\Controllers;

use App\Models\Pikr;
use App\Http\Requests\StorePikrRequest;
use App\Http\Requests\UpdatePikrRequest;
use App\Models\Desa;
use App\Models\Kabkota;
use App\Models\Pembina;

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
    //
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
}
