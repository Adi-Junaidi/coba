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
    // this is a MAGIC that groups PIK-R by KabKota
    // It does work, don't 🚫 touch it
    $kabkotaPikrs = $kabkotas->mapWithKeys(fn ($kabkota) => [
      $kabkota->id => $kabkota->kecamatan->flatMap(fn ($kecamatan) => $kecamatan->pikrs)
    ]);

    $kabkotas->each(function ($kabkota) use ($kabkotaPikrs) {
      $kabkota->pikrs = $kabkotaPikrs[$kabkota->id];
    });

    return view('partials.exports.12b', compact('kabkotas'));
  }
}
