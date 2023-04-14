<?php

namespace App\Http\Controllers;

use App\Models\KonselingKelompok;
use App\Http\Requests\StoreKonselingKelompokRequest;
use App\Http\Requests\UpdateKonselingKelompokRequest;
use Illuminate\Http\Request;

class KonselingKelompokController extends Controller
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
     * @param  \App\Http\Requests\StoreKonselingKelompokRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'tanggal_kk' => 'required',
            'konseb_kk' => 'required',
            'cowok_kk' => 'required',
            'cewek_kk' => 'required',
            'kel1_kk' => 'required',
            'kel2_kk' => 'required',
            'kel3_kk' => 'required',
            'materi_kk' => 'required',
        ];

        if ($request->materi_kk == "Lainnya") {
            $rules['materi_kk_lainnya'] = 'required';
        }

        $request->validate($rules);

        $jumlah_jk = $request->cowok_kk + $request->cewek_kk;
        $jumlah_kel = $request->kel1_kk + $request->kel2_kk + $request->kel3_kk;

        if ($jumlah_jk !== $jumlah_kel) return \redirect()->back()->withErrors(['fail' => 'Jumlah Peserta Yang Dimasukkan tidak valid']);

        if ($jumlah_jk == 0) return \redirect()->back()->withErrors(['fail' => 'Jumlah Peserta Yang Dimasukkan tidak valid']);

        $storeData = [
            'laporan_id' => $request->laporan_id,
            'materi_id' => $request->materi_kk,
            'pengurus_id' => $request->laporan_id,
            'tanggal' => $request->tanggal_kk,
            'jumlah_cowok' => $request->cowok_kk,
            'jumlah_cewek' => $request->cewek_kk,
            'jumlah_rawal' => $request->kel1_kk,
            'jumlah_rtengah' => $request->kel2_kk,
            'jumlah_rakhir' => $request->kel3_kk,
        ];

        if ($request->materi_kk == 'Lainnya') {
            $storeData['materi_id'] = 0;
            $storeData['materi_lainnya'] = $request->materi_kk_lainnya;
        }

        KonselingKelompok::create($storeData);

        return \redirect()->back()->with('success', 'Berhasil Menambah Data Konseling Kelompok Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonselingKelompok  $konselingKelompok
     * @return \Illuminate\Http\Response
     */
    public function show(KonselingKelompok $konselingKelompok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonselingKelompok  $konselingKelompok
     * @return \Illuminate\Http\Response
     */
    public function edit(KonselingKelompok $konselingKelompok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKonselingKelompokRequest  $request
     * @param  \App\Models\KonselingKelompok  $konselingKelompok
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKonselingKelompokRequest $request, KonselingKelompok $konselingKelompok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonselingKelompok  $konselingKelompok
     * @return \Illuminate\Http\Response
     */
    public function destroy(KonselingKelompok $konselingKelompok)
    {
        //
    }
}
