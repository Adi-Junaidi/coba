<?php

namespace App\Http\Controllers;

use App\Models\MitraPikr;
use App\Http\Requests\StoreMitraPikrRequest;
use App\Http\Requests\UpdateMitraPikrRequest;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MitraPikrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bentuk_kerjasama = [
            'Sponsorship',
            'Narasumber',
            'Rujukan',
            'Lainnya',
        ];


        return view('user-pikr/data/mitra', [
            'title' => 'Mitra',
            'bentuk_kerjasama' => $bentuk_kerjasama,
            'mitra_s' => MitraPikr::all(),
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
     * @param  \App\Http\Requests\StoreMitraPikrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nama' => 'required',
            'mou' => 'required',
            'bentuk_kerjasama' => 'required',
        ]);

        $validatedData['pikr_id'] = auth()->user()->pikr->id;

        MitraPikr::create($validatedData);
        Alert::success('New Post has been added!');

        return \redirect('/up/data/mitra');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MitraPikr  $mitraPikr
     * @return \Illuminate\Http\Response
     */
    public function show(MitraPikr $mitraPikr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MitraPikr  $mitraPikr
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = MitraPikr::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMitraPikrRequest  $request
     * @param  \App\Models\MitraPikr  $mitraPikr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'mou' => 'required',
            'bentuk_kerjasama' => 'required',
        ]);
        $validatedData['pikr_id'] = auth()->user()->pikr->id;
        
        $id = MitraPikr::find($id)->toArray()['id'];


        MitraPikr::where('id', $id)->update($validatedData);
        Alert::success('New Post has been added!');

        return \redirect('/up/data/mitra');
    }

    public function updateByAdmin(Request $request, MitraPikr $mitra)
    {
        $mitra->update($request->except('_token'));
        return \back()->with('success', 'Berhasil mengubah data mitra pikr');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MitraPikr  $mitraPikr
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MitraPikr::destroy($id);
        return \redirect('/up/data/mitra');
    }

    public function destroyByAdmin(MitraPikr $mitra)
    {
        $mitra->delete();
        return \back()->with('success', 'Berhasil menghapus data mitra pikr');
    }

    public function getData(MitraPikr $mitra)
    {
        return \response()->json($mitra);
    }
}
