@extends('layouts.auth')

@section('title', 'Daftar PIK-R')

@section('form')
  <form class="login100-form validate-form p-b-33 p-t-5" action="/register" method="post">
    @csrf

    <div class="wrap-input100 validate-input" data-validate="Masukkan Nama">
      <input class="input100" name="nama" type="text" placeholder="Masukkan Nama">
      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Enter username">
      <input class="input100" name="username" type="text" placeholder="Username">
      <span class="focus-input100" data-placeholder="&#xe82a;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Enter email">
      <input class="input100" name="email" type="email" placeholder="Email">
      <span class="focus-input100" data-placeholder="&#xe818;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Masukkan password">
      <input class="input100" name="password" type="password" placeholder="Masukkan Password">
      <span class="focus-input100" data-placeholder="&#xe80f;"></span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Konfirmasi password">
      <input class="input100" name="passwordConfirm" type="password" placeholder="Konfirmasi Password">
      <span class="focus-input100" data-placeholder="&#xe80f;"></span>
    </div>

    <div class="container-login100-form-btn m-t-32">
      <button class="login100-form-btn">Daftar</button>
    </div>

    <div class="mt-3 text-center">Sudah punya akun? <a href="/login">Login</a></div>
  </form>
@endsection
