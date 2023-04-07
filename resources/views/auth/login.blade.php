@extends('layouts.auth')

@section('title', 'Login')

@section('form')
  <form class="login100-form validate-form p-b-33 p-t-5" action="/login" method="post">
    @csrf

    <div class="wrap-input100 validate-input" data-validate="Masukkan Username">
      <input class="input100" name="username" type="text" placeholder="Masukkan Username">
      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Masukkan Password">
      <input class="input100" name="password" type="password" placeholder="Masukkan Password">
      <span class="focus-input100" data-placeholder="&#xe80f;"></span>
    </div>

    <div class="container-login100-form-btn m-t-32">
      <button class="login100-form-btn">Login</button>
    </div>

    <div class="mt-3 text-center">Belum punya akun? <a href="/register">Daftar</a></div>
  </form>
@endsection
