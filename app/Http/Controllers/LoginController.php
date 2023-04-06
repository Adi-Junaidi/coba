<?php

namespace App\Http\Controllers;

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

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      Alert::success('Login Successful!');

      return redirect()->intended('/main');
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
