<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Http\Requests\StoreMateriRequest;
use App\Http\Requests\UpdateMateriRequest;
use App\Models\MateriPikr;
use App\Models\Stepper;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Materi::distinct()->pluck('kategori')->toArray();
        $materi = Materi::all();
        
        return view('user-pikr/data/materi', [
            'title' => 'Materi',
            'kategori' => $kategori,
            'materi' => $materi,
            'materi_pikr' => (MateriPikr::where('pikr_id', \auth()->user()->pikr->id)->first()) ?: '',
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
     * @param  \App\Http\Requests\StoreMateriRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $materiData = $request->toArray();
        $materiData['pikr_id'] = \auth()->user()->pikr->id;
        MateriPikr::create($materiData);
        Stepper::where('pikr_id', auth()->user()->pikr->id)->update(['materi'=> true]);
        return \redirect('/up/data/materi')->with('success', 'Berhasil Melengkapi Data Ketersediaan Materi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit(Materi $materi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMateriRequest  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MateriPikr $materi)
    {
        $materi->update($request->except('_method', '_token'));
        return \back()->with('success', 'Berhasil Mengubah Data Ketersediaan Materi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        //
    }

}
