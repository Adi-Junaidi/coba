<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->validate([
      'username' => 'required|exists:users',
      'password' => 'required|min:8'
    ]);

    $pikr = User::where('username', $credentials['username'])->first()?->pikr;
    if ($pikr && !$pikr->verified) {
      return back()->with('error', "{$pikr->nama} belum diverifikasi oleh PLKB setempat");
    }

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      Alert::success('Login Successful!');

      return redirect()->intended('/');
    }

    return back()->with('error', "Login gagal. Cek kembali Username dan Password yang dimasukkan");
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
  }
}
