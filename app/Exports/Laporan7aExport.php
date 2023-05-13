<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Laporan7aExport implements FromView
{
  private $kabkotas;
  private $filters;

  public function __construct($kabkotas, $filters)
  {
    $this->kabkotas = $kabkotas;
    $this->filters = $filters;
  }

  public function view(): View
  {
    $kabkotas = $this->kabkotas;
    $filters = $this->filters;

    return view('partials.exports.7a', compact('kabkotas', 'filters'));
  }
}
