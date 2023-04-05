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
        return view('user-pikr/data/informasi', [
            'title' => 'Biodata',
        ]);
    }


}
