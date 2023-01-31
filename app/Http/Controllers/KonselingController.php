<?php

namespace App\Http\Controllers;

use App\Models\Konseling;
use App\Http\Requests\StoreKonselingRequest;
use App\Http\Requests\UpdateKonselingRequest;

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
    public function store(StoreKonselingRequest $request)
    {
        //
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
    public function destroy(Konseling $konseling)
    {
        //
    }
}
