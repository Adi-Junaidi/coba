<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    if (auth()->user()->isPikr()) {
      return view('user-pikr.dashboard', [
        'title' => 'Dashboard',
      ]);
    } else {
      return view('dashboard', [
        "pembina" => Pembina::all()
      ]);
    }
  }
}
