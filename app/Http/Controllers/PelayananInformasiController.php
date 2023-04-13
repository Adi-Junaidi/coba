<?php

namespace App\Http\Controllers;

use App\Models\PelayananInformasi;
use App\Http\Requests\StorePelayananInformasiRequest;
use App\Http\Requests\UpdatePelayananInformasiRequest;
use App\Models\Pembina;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class PelayananInformasiController extends Controller
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
     * @param  \App\Http\Requests\StorePelayananInformasiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'tanggal_pelayanan' => 'required',
            'nama_pelayanan' => 'required',
            'jumlah_remaja' => 'required|integer|min:1',
            'nama_narsum_pelayanan' => 'required',
        ];
        
        if($request->materi_pelayanan == "Lainnya"){
            $rules['materi_pelayanan_lainnya'] = 'required';
        }
        
        $request->validate($rules);
        
        $storeData = [
            'pikr_id' => \session('pikr_id'),
            'materi_id' => $request->materi_pelayanan,
            'laporan_id' => $request->laporan_id,
            'tanggal' => $request->tanggal_pelayanan,
            'nama' => $request->nama_pelayanan,
            'narsum' => $request->nama_narsum_pelayanan,
            'jabatan_narsum' => $request->narsum_pelayanan,
            'jumlah_peserta' => $request->jumlah_remaja,
        ];
        
        if($request->materi_pelayanan == "Lainnya"){
            $storeData['materi_id'] = 0;
            $storeData['materi_lainnya'] = $request->materi_pelayanan_lainnya;
        }

        PelayananInformasi::create($storeData);

        return \redirect()->back()->with('success', 'Pelayanan Informasi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PelayananInformasi  $pelayananInformasi
     * @return \Illuminate\Http\Response
     */
    public function show(PelayananInformasi $pelayananInformasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PelayananInformasi  $pelayananInformasi
     * @return \Illuminate\Http\Response
     */
    public function edit(PelayananInformasi $pelayananInformasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePelayananInformasiRequest  $request
     * @param  \App\Models\PelayananInformasi  $pelayananInformasi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePelayananInformasiRequest $request, PelayananInformasi $pelayananInformasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PelayananInformasi  $pelayananInformasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(PelayananInformasi $pelayanan)
    {
        $pelayanan->delete();
        return \redirect()->back()->with('success'. 'Data Berhasil Dihapus');
    }

    public function getPendidikSebaya()
    {
        $data = Pengurus::where('jabatan', 'Pendidik Sebaya')->get();
        return \response()->json($data);
    }

    public function getKonselorSebaya()
    {
        $data = Pengurus::where('jabatan', 'Konselor Sebaya')->get();
        return \response()->json($data);
    }

    public function getPLKB()
    {
        $data = Pembina::all();
        return \response()->json($data);
    }
}
