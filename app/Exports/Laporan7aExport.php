<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan7aExport implements FromView
{
  private $filters;
  private $kabkota;
  private $areas;

  public function __construct($kabkota, $filters, $areas)
  {
    $this->kabkota = $kabkota;
    $this->filters = $filters;
    $this->areas = $areas;
  }

  public function view(): View
  {
    $kabkota = $this->kabkota;
    $filters = $this->filters;
    $areas = $this->areas;

    return view('partials.exports.7a', compact('kabkota', 'filters', 'areas'));
  }
}
