<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Http\Requests\StoreKabkotaRequest;
use App\Http\Requests\UpdateKabkotaRequest;

class KabkotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData(Kabkota $kabkota)
    {
        return response()->json($kabkota->kecamatan);
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
     * @param  \App\Http\Requests\StoreKabkotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKabkotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function show(Kabkota $kabkota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function edit(Kabkota $kabkota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKabkotaRequest  $request
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKabkotaRequest $request, Kabkota $kabkota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kabkota  $kabkota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kabkota $kabkota)
    {
        //
    }
}
