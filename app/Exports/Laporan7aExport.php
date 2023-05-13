<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan7aExport implements FromView
{
  private $kabkotas;
  private $filters;
  private $month;

  public function __construct($kabkotas, $filters, $month)
  {
    $this->kabkotas = $kabkotas;
    $this->filters = $filters;
    $this->month = $month;
  }

  public function view(): View
  {
    $kabkotas = $this->kabkotas;
    $month = $this->month;
    $filters = $this->filters;

    return view('partials.exports.7a', compact('kabkotas', 'filters', 'month'));
  }
}
