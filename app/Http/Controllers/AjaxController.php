<?php

namespace App\Http\Controllers;

use App\Models\PelayananInformasi;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function kegiatan_pelayanan(Request $request)
    {
        $data = [
            'pikr_id' => \session('pikr_id'),
         ];

        // PelayananInformasi::create($request->all());

        return $data;
    }
}
