<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\Pikr;
use App\Models\Result;
use App\Models\Stepper;
use Illuminate\Http\Request;

class UserPikrController extends Controller
{
    public function dashboard()
    {
        $peringkat = 'Belum Mendapat Peringkat';

        $bulan_ini = date('m-Y');
        $results = Result::where('bulan_tahun', $bulan_ini)->orderBy('point', 'desc')->get();
        $rank = $results->where('pikr_id', \auth()->user()->pikr->id);
        
        if($rank->isNotEmpty()){
            $peringkat = $rank->keys()->first() + 1;
        }else{
            $peringkat = 'Belum mendapat peringkat';
        }

        return view('user-pikr.dashboard', [
            'title' => 'Dashboard',
            'peringkat' =>$peringkat,
        ]);
    }

    public function b_identitas()
    {
        return view('user-pikr/data/identitas', [
            'title' => 'Identitas',
            'pikr_info' => Pikr::where('user_id', auth()->user()->pikr->id)->first(),    
        ]);
    }

    public function updateIdentitas(Request $request, Pikr $pikr)
    {
        $pikr->update(['akun_medsos' => $request->sosmed]);
        return \redirect()->back()->with('success', 'Data identitas kelompok berhasil di ubah');    
    }

    public function b_informasi()
    {

        $dikeluarkan = [
            'Kepala Desa',
            'Kepala Lurah',
            'Camat',
            'OPB-KB',
            'Bupati',
            'Walikota',
        ];

        $sumber_dana = [
            'APBN',
            'APBD',
            'ADD',
            'Swadaya',
        ];

        $pikr_info = Pikr::find(auth()->user()->pikr->id);

        $data = [
            'title' => 'Biodata',
            'dikeluarkan' => $dikeluarkan,
            'sk' => Sk::where('pikr_id', \auth()->user()->pikr->id)->first(),
            'sumber_dana_pikr' => explode(',', $pikr_info->sumber_dana),
            'sumber_dana' => $sumber_dana,
            'pikr_info' => $pikr_info,
        ];

        return view('user-pikr/data/informasi', $data);
    }

    public function s_informasi(Request $request)
    {
        $id = auth()->user()->pikr->id;

        $information_rules = [
            'keterpaduan_kelompok' => 'required',
            'pro_pn' => 'required',
        ];


        $informationData = $request->validate($information_rules);

        if ($request->has('has_sk')) {
            $sk_rules = [
                'no_sk' => 'required|unique:sks,no_sk',
                'tanggal_sk' => 'required',
                'dikeluarkan_oleh' => 'required',
            ];
            $skData = $request->validate($sk_rules);
            $skData['pikr_id'] = $id;
            Sk::create($skData);

            $informationData['sk_id'] = Sk::where('pikr_id', $id)->first()->id;
        }

        if ($request->has('sumber_dana')) {
            $informationData['sumber_dana'] = \implode(',', $request->sumber_dana);
        } else {
            $informationData['sumber_dana'] = 'Tidak Ada';
        }

        Pikr::where('id', $id)->update($informationData);
        Stepper::where('pikr_id', $id)->update(['current_step' => 'Complete', 'informasi' => true]);

        return \redirect('/up/data/informasi')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function addSk(Request $request, $id)
    {
        $sk_rules = [
            'no_sk' => 'required|unique:sks,no_sk',
            'tanggal_sk' => 'required',
            'dikeluarkan_oleh' => 'required',
        ];

        $skData = $request->validate($sk_rules);
        $skData['pikr_id'] = $id;
        
        Sk::create($skData);
        
        Pikr::where('id', $id)->update(['sk_id' => Sk::where('pikr_id', $id)->first()->id]);
        return \redirect('/up/data/informasi')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function updateSk(Request $request)
    {
        $id = $request->pikr_id;
        $sk_rules = [
            'tanggal_sk' => 'required',
            'dikeluarkan_oleh' => 'required',
        ];
        
        $sk = Sk::where('pikr_id', $id)->first();
        
        if ($sk->no_sk !== $request->no_sk) {
            $sk_rules['no_sk'] = 'required|unique:sks,no_sk';
        }
        
        $skData = $request->validate($sk_rules);
        $skData['pikr_id'] = $id;

        Sk::where('pikr_id', $id)->update($skData);
        return \redirect('/up/data/informasi')->with('success', 'Data berhasil diubah');
    }
}
