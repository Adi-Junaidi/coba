<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
  public function index()
  {
    return view('auth.register');
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      "nama" => "required|max:255",
      "username" => "required|min:5|max:255|unique:users",
      "email" => "required|email:dns|unique:users",
      "password" => "required|min:8|max:255"
    ]);

    $validatedData["password"] = bcrypt($validatedData["password"]);

    User::create($validatedData);

    Alert::success('Registrasi Berhasil!');

    return redirect('/login');
  }
}
