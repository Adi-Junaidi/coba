<?php

namespace App\Exports;

use App\Models\Kabkota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan12aExport implements FromView
{
  public function view(): View
  {
    $kabkotas = Kabkota::withPikrs();

    return view('partials.exports.12a', compact('kabkotas'));
  }
}
