<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Http\Requests\StoreSkRequest;
use App\Http\Requests\UpdateSkRequest;

class SkController extends Controller
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
     * @param  \App\Http\Requests\StoreSkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sk  $sk
     * @return \Illuminate\Http\Response
     */
    public function show(Sk $sk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sk  $sk
     * @return \Illuminate\Http\Response
     */
    public function edit(Sk $sk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkRequest  $request
     * @param  \App\Models\Sk  $sk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkRequest $request, Sk $sk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sk  $sk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sk $sk)
    {
        //
    }
}
