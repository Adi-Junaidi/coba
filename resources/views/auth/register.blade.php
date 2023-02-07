@extends('layouts.auth')

@section('title', 'Register')

@section('inputs')
  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ old('nama') }}" placeholder="Nama" required autocomplete="off" autofocus>
    <div class="form-control-icon">
      <i class="bi bi-card-text"></i>
    </div>
    @error('nama')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Username" required autocomplete="off">
    <div class="form-control-icon">
      <i class="bi bi-person"></i>
    </div>
    @error('username')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
    <div class="form-control-icon">
      <i class="bi bi-envelope"></i>
    </div>
    @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>

  <div class="form-group position-relative has-icon-left mb-4">
    <input class="form-control form-control-xl @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password" required autocomplete="off">
    <div class="form-control-icon">
      <i class="bi bi-shield-lock"></i>
    </div>
    @error('password')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
  </div>
@endsection

@section('text')
  Already have an account?
  <a class="font-bold" href="/login">Log in</a>
@endsection
