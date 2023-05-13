<?php

namespace App\Exports;

use App\Models\Kabkota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan12bExport implements FromView
{
  public function view(): View
  {
    $kabkotas = Kabkota::all();

    return view('partials.exports.12b', compact('kabkotas'));
  }
}
