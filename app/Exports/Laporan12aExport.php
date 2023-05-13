<?php

namespace App\Exports;

use App\Models\Kabkota;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan12aExport implements FromView
{
  private $kabkota;
  private $filters;
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

    return view('partials.exports.12a', compact('kabkota', 'filters', 'areas'));
  }
}
