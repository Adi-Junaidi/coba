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
      'username' => 'required',
      'password' => 'required'
    ]);

    $pikr = User::where('username', $credentials['username'])->first()?->pikr;
    if ($pikr && !$pikr->verified) {
      return back()->with('error', "{$pikr->nama} belum diverifikasi oleh PLKB setempat");
    }

    if (Auth::attempt($credentials)) {

      $request->session()->regenerate();

      Alert::success('Login Successful!');

      return redirect()->intended('/');
    } else {
      Alert::error('Login Failed!');
    }

    return back();
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
  }
}
