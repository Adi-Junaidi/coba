<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
    {   
        
        $bulanTahun = Result::select('bulan_tahun')->distinct()->orderBy('bulan_tahun', 'asc')->get();
        $rank = Result::where('bulan_tahun', date('m-Y'))->orderBy('point', 'desc')->get(); 

        $data = [
            'title' => 'Peringkat PIK-R',
            'ranks' => $rank,
            'bulan_tahun' => $bulanTahun,
            'periode' => convertBulanTahun(date('m-Y'))
        ];

        $url = 'peringkat.index';
        if(\auth()->user()->isPikr()){
            $url = 'peringkat.pikr';
        }
        
        return \view($url, $data);
    }
    
    public function filter(Request $request)
    {
        $bulanTahun = Result::select('bulan_tahun')->distinct()->orderBy('bulan_tahun', 'asc')->get();
        $rank = Result::where('bulan_tahun', $request->bulan_tahun)->orderBy('point', 'desc')->get(); 
        
        $data = [
            'title' => 'Peringkat PIK-R',
            'ranks' => $rank,
            'bulan_tahun' => $bulanTahun,
            'periode' => convertBulanTahun($request->bulan_tahun),
        ];

        $url = 'peringkat.index';
        if(\auth()->user()->isPikr()){
            $url = 'peringkat.pikr';
        }
        
        return \view($url, $data);
    }
}
