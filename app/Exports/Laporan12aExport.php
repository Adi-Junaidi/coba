<?php

namespace App\Exports;

use App\Models\Kabkota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan12aExport implements FromView
{
  private $kabkota;
  private $kecamatan;
  private $filters;
  private $areas;

  public function __construct($kabkota, $kecamatan, $filters, $areas)
  {
    $this->kabkota = $kabkota;
    $this->kecamatan = $kecamatan;
    $this->filters = $filters;
    $this->areas = $areas;
  }

  public function view(): View
  {
    $kabkota = $this->kabkota;
    $kecamatan = $this->kecamatan;
    $filters = $this->filters;
    $areas = $this->areas;

    return view('partials.exports.12a', compact('kabkota', 'kecamatan', 'filters', 'areas'));
  }
}
