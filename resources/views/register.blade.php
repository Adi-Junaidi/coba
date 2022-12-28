<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI PIK-R | {{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="{{ asset('dist') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dist') }}/assets/images/logo/favicon.png" type="image/png">
</head>

<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">

            <h1 class="auth-title fs-1">Registration</h1>

            <form action="/register" method="POST">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" id="nama" name="nama" class="form-control form-control-xl @error('nama') is-invalid @enderror" placeholder="Nama" required value="{{ old('nama') }}" autocomplete="off" autofocus>
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
                    <input type="text" id="username" name="username" class="form-control form-control-xl @error('username') is-invalid @enderror" placeholder="Username" required value="{{ old('username') }}" autocomplete="off">
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
                    <input type="email" id="email" name="email" class="form-control form-control-xl @error('email') is-invalid @enderror" placeholder="Email" required value="{{ old('email') }}" autocomplete="off">
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
                    <input type="password" id="password" name="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="off">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Register</button>
            </form>
            <div class="text-center mt-3 text-lg fs-5">
                <p class='text-gray-600'>Already have an account? <a href="/login" class="font-bold">Log
                        in</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>

</body>

</html>
