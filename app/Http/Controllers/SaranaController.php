<?php

namespace App\Http\Controllers;

use App\Models\Sarana;
use App\Http\Requests\StoreSaranaRequest;
use App\Http\Requests\UpdateSaranaRequest;

class SaranaController extends Controller
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
     * @param  \App\Http\Requests\StoreSaranaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaranaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function edit(Sarana $sarana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaranaRequest  $request
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaranaRequest $request, Sarana $sarana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sarana  $sarana
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sarana $sarana)
    {
        //
    }
}
