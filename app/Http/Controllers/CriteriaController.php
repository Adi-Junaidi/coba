<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'criterias' => Criteria::all()
        ];
        return view('spk.criteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'bobot' => 'required',
            'status' => 'required',
        ]);
        $criterias = Criteria::all();

        $total = $request->bobot;
        foreach($criterias as $criteria){
            $total += $criteria->bobot;
            $criteria->update(['normalisasi' => $criteria->bobot/$total]);
        }

        Criteria::create([
            'nama' => $request->nama,
            'bobot' => $request->bobot,
            'status' => $request->status,
            'normalisasi' => $request->bobot/$total,
        ]);

        return back()->with('success', 'Berhasil menambahkan kriteria');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteria $criterion)
    {   

        $criterias = Criteria::all();

        $total = $request->bobot;
        foreach($criterias as $criteria){
            $total += $criteria->bobot;
        }

        foreach($criterias as $criteria){
            $criteria->update(['normalisasi' => $criteria->bobot/$total]);
        }

        $criterion->update([
            'bobot' => $request->bobot,
            'normalisasi' => $request->bobot/$total
        ]);
        
        return back()->with('success', 'Berhasil mengubah bobot kriteria');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteria $criteria)
    {
        $total = 0;
        foreach(Criteria::all() as $criteria){
            $total += $criteria->bobot;
        }
        $total -= $criteria->bobot;
        $criteria->delete();
        
        foreach(Criteria::all() as $criteria){
            $criteria->update(['normalisasi' => $criteria->bobot/$total]);
        }

        return back()->with('success', 'Berhasil menghapus kriteria');

    }
}
