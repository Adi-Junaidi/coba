<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "title" => "Dashboard",
            "pembina" => Pembina::all()
        ]);
    }
}
