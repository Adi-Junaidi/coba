<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI PIK-R | {{ $title }}</title>
    
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/main/app.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/main/app-dark.css">
    <link rel="shortcut icon" href="{{ asset('dist') }}/assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('dist') }}/assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/shared/iconly.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/css/pages/auth.css">
    <link rel="stylesheet" href="{{ asset('dist') }}/assets/extensions/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div id="auth">
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">

            @include('sweetalert::alert')

            <h1 class="auth-title fs-1">Log in.</h1>

            <form action="/login" method="POST">
                @csrf

                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" id="username" name="username" class="form-control form-control-xl" placeholder="Username" autofocus autocomplete="off" required>
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Password" required>
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                {{-- <div class="form-check form-check-lg d-flex align-items-end">
                    <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label text-gray-600" for="flexCheckDefault">
                        Keep me logged in
                    </label>
                </div> --}}
                <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3">Log in</button>
            </form>
            <div class="text-center mt-3 text-lg fs-5">
                <p class="text-gray-600">Don't have an account? <a href="/register" class="font-bold">Register Now!</a></p>
                {{-- <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p> --}}
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
