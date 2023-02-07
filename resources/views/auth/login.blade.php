@extends('layouts.auth')

@section('title', 'Login')

@section('inputs')
  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl" id="username" name="username" type="text" placeholder="Username" autofocus autocomplete="off" required>
    <div class="form-control-icon">
      <i class="bi bi-person"></i>
    </div>
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl" id="password" name="password" type="password" placeholder="Password" required>
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
  </div>
@endsection

@section('text')
  Don't have an account?
  <a class="font-bold" href="/register">Register Now!</a>
@endsection
