<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Pembina;
use App\Models\Pikr;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    return view('dashboard', [
      "pembina" => Pembina::all(),
      "pikr" => Pikr::allVerified(),
      'laporan' => Laporan::all()
    ]);
  }
}
