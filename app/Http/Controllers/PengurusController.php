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
            'pengurus' => Pengurus::all(),
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
        // return $request;

        $validatedData = $request->validate([
            'nik' => 'required|unique:penguruses,nik',
            'nama' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'pernah_pelatihan' => 'required',
        ]);

        $validatedData['pikr_id'] = auth()->user()->id;

        Pengurus::create($validatedData);
        Alert::success('New Post has been added!');

        return \redirect('/up/data/pengurus');
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
    public function update(Request $request, $id)
    {

        $pengurus = Pengurus::find($id);

        $rules = [
            'nama' => 'required',
            'no_hp' => 'required',
            'jabatan' => 'required',
            'pernah_pelatihan' => 'required',
        ];


        if ($pengurus->nik !== $request->nik) {
            $rules['nik'] = 'required|unique:penguruses,nik';
        }
        
        $validatedData = $request->validate($rules);

        $validatedData['pikr_id'] = auth()->user()->id;

        Pengurus::where('id', $id)->update($validatedData);
        Alert::success('New Post has been added!');

        return \redirect('/up/data/pengurus ');
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
