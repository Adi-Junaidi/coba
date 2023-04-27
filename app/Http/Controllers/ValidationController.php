<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pikr;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    public function validatePikr()
    {
        return \view('validation.pikr', [
            'pikr' => Pikr::all()
        ]);
    }

    public function validateKegiatan()
    {
        return \view('validation.kegiatan', [
            'laporan' => Laporan::all(),
        ]);
    }
}
