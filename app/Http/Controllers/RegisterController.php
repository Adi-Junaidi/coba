<?php

namespace App\Http\Controllers;

use App\Models\Kabkota;
use App\Models\Pembina;
use App\Models\Pikr;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register', [
      "pembinas" => Pembina::all(),
      "kabkotas" => Kabkota::all(),
    ]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      "nama" => "required|max:255",
      "username" => "required|min:5|max:255|unique:users",
      // "email" => "required|email:dns|unique:users",
      "email" => "required|email|unique:users",
      "password" => "required|min:8|max:255",
      "passwordConfirm" => "required|min:8|max:255|same:password",

      // FIXME: perbaiki validasi
      "desa_id" => "required",
      "pembina" => "required",
      "alamat" => "required",
      "basis" => "required",
    ]);

    $validatedData["password"] = bcrypt($validatedData["password"]);
    $pembina = Pembina::where('nama', $validatedData['pembina'])->first();
    if (!$pembina) {
      $pembina = Pembina::create([
        "nama" => $validatedData["pembina"]
      ]);
    }

    $user = User::create($validatedData);
    Pikr::create([
      "nama" => $user->nama,
      "user_id" => $user->id,
      "desa_id" => $validatedData["desa_id"],
      "pembina_id" => $pembina->id,
      "no_register" => "750101B01", // FIXME: generate otomatis
      "no_urut" => "99", // FIXME: generate otomatis
      "alamat" => $validatedData["alamat"],
      "basis" => $validatedData["basis"],
    ]);

    Alert::success('Registrasi Berhasil!');

    return redirect('/login');
  }
}
