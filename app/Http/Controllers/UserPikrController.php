<?php

namespace App\Http\Controllers;

use App\Models\Sk;
use App\Models\Pikr;
use App\Models\Stepper;
use Illuminate\Http\Request;

class UserPikrController extends Controller
{
    public function dashboard()
    {
        return view('user-pikr/dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function b_informasi()
    {
        $stepper = Stepper::where('pikr_id', \auth()->user()->id)->first();

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

        $pikr_info = Pikr::where('user_id', \auth()->user()->id)->first();

        $data = [
            'title' => 'Biodata',
            'dikeluarkan' => $dikeluarkan,
            'sk' => Sk::where('pikr_id', \auth()->user()->id)->first(),
            'sumber_dana_pikr' => explode(',', $pikr_info->sumber_dana),
            'sumber_dana' => $sumber_dana,
            'pikr_info' => $pikr_info,
        ];

        return view('user-pikr/data/informasi', $data);
    }

    public function s_informasi(Request $request)
    {
        $id = auth()->user()->id;

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

            $informationData['sk_id'] = Sk::where('pikr_id', $id)->get()->toArray()['id'];
        }

        if ($request->has('sumber_dana')) {
            $informationData['sumber_dana'] = \implode(',', $request->sumber_dana);
        } else {
            $informationData['sumber_dana'] = 'Tidak Ada';
        }

        Pikr::where('user_id', $id)->update($informationData);
        Stepper::where('pikr_id', $id)->update(['current_step' => 'step_2', 'step_2' => true]);

        return \redirect('/up/data/informasi');
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
        
        Pikr::where('pikr_id', $id)->update(['sk_id' => Sk::where('pikr_id', $id)->first()->id]);
        return \redirect('/up/data/informasi');
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
        return \redirect('/up/data/informasi');
    }
}
