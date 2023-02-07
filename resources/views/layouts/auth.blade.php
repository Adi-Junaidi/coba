<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SI PIK-R | @yield('title')</title>

  <link href="{{ asset('dist') }}/assets/css/main/app.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/main/app-dark.css" rel="stylesheet">
  <link type="image/x-icon" href="{{ asset('dist') }}/assets/images/logo/favicon.svg" rel="shortcut icon">
  <link type="image/png" href="{{ asset('dist') }}/assets/images/logo/favicon.png" rel="shortcut icon">
  <link href="{{ asset('dist') }}/assets/css/shared/iconly.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/pages/auth.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/extensions/sweetalert2/sweetalert2.min.css" rel="stylesheet">
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          @include('sweetalert::alert')

          <h1 class="auth-title fs-1">@yield('title')</h1>

          <form action="/login" method="POST">
            @csrf
            @yield('inputs')

            <button class="btn btn-primary btn-block btn-lg mt-3 shadow-lg">@yield('title')</button>
          </form>

          <div class="fs-5 mt-3 text-center text-lg">
            <p class="text-gray-600">@yield('text')</p>
          </div>
        </div>
      </div>

      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
</body>

</html>
