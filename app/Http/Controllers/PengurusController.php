<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\UpdatePengurusRequest;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $jabatan = [
            'Pembina',
            'Ketua',
            'Sekretaris',
            'Bendahara',
            'Ketua Bidang',
            'Pendidik Sebaya',
            'Konselor Sebaya',
            'Anggota',
        ];



        return view('user-pikr/data/pengurus', [
            'title' => 'Pengurus',
            'jabatan' => $jabatan,
            'pengurus' => Pengurus::where('pikr_id', auth()->user()->pikr->id)->get(),
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
     * @param  \App\Http\Requests\StorePengurusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nik' => 'required|unique:penguruses,nik|numeric',
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'jabatan' => 'required',
            'pernah_pelatihan' => 'required',
        ]);

        $uniqueJabatan = [
            'Pembina',
            'Ketua',
            'Sekretaris',
            'Bendahara',
        ];

        foreach ($uniqueJabatan as $item) {
            if ($request->jabatan == $item) {
                // Mengambil data pengurus dengan jabatan "ketua" dari database
                $data = Pengurus::where('pikr_id', auth()->user()->pikr->id)->where('jabatan', $item)->first();
                if($data){
                    return back()->with('fail', 'Tidak dapat menyimpan data karena jabatan ' . $item . ' sudah ada pada pengurus lain');
                }
            }
        }

        $validatedData['pikr_id'] = auth()->user()->pikr->id;

        Pengurus::create($validatedData);

        return \redirect('/up/data/pengurus')->with('success', 'Data pengurus berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function show(Pengurus $pengurus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pengurus::find($id);
        return response()->json($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePengurusRequest  $request
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengurus $penguru)
    {
        $rules = [
            'e_nama' => 'required',
            'e_no_hp' => 'required|numeric',
            'e_pernah_pelatihan' => 'required',
        ];


        if ($penguru->nik !== $request->e_nik) {
            $rules['e_nik'] = 'required|unique:penguruses,nik|numeric';
        }

        $validatedData = $request->validate($rules);
        $updateData = [];

        foreach($validatedData as $key => $data){
            $newKey = substr($key, 2);
            $updateData[$newKey] = $data;
        }

        $penguru->update($updateData);

        return redirect('/up/data/pengurus')->with('success', 'Berhasil merubah data pengurus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengurus  $pengurus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengurus::destroy($id);
        return \redirect('/up/data/pengurus');
    }
}
