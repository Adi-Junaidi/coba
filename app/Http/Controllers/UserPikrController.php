<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserPikrController extends Controller
{
    public function dashboard()
    {
        return view('user-pikr/dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function b_identitas()
    {
        return view('user-pikr/biodata/identitas', [
            'title' => 'Biodata',
        ]);
    }

    public function b_informasi()
    {
        return view('user-pikr/biodata/informasi', [
            'title' => 'Biodata',
        ]);
    }

    public function b_ketersediaan()
    {
        return view('user-pikr/biodata/ketersediaan', [
            'title' => 'Biodata',
        ]);
    }

    public function b_mitra()
    {
        return view('user-pikr/biodata/mitra', [
            'title' => 'Biodata',
        ]);
    }

    public function b_pengurus()
    {
        return view('user-pikr/biodata/pengurus', [
            'title' => 'Biodata',
        ]);
    }
}
