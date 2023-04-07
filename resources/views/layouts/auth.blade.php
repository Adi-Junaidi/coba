<!DOCTYPE html>
<html lang="en">

<head>
  <title>SI PIK-R | @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link type="image/x-icon" href="/dist/assets/images/logo/favicon.svg" rel="shortcut icon">
  <link type="image/png" href="/dist/assets/images/logo/favicon.png" rel="shortcut icon">

  <link type="text/css" href="/auth/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/vendor/animate/animate.css" rel="stylesheet">
  <link type="text/css" href="/auth/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/vendor/animsition/css/animsition.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/vendor/select2/select2.min.css" rel="stylesheet">
  <link type="text/css" href="/auth/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">
  <link type="text/css" href="/auth/css/util.css" rel="stylesheet">
  <link type="text/css" href="/auth/css/main.css" rel="stylesheet">

  @yield('styles')
</head>

<body>
  <div class="limiter">
    <div class="container-login100" style="background-image: url('/auth/images/bg-01.jpg');">
      <div class="wrap-login100 p-t-30 p-b-50">
        <span class="login100-form-title p-b-41">@yield('title')</span>

        @yield('form')
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>

  <script src="/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
  <script src="/auth/vendor/animsition/js/animsition.min.js"></script>
  <script src="/auth/vendor/bootstrap/js/popper.js"></script>
  <script src="/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="/auth/vendor/select2/select2.min.js"></script>
  <script src="/auth/vendor/daterangepicker/moment.min.js"></script>
  <script src="/auth/vendor/daterangepicker/daterangepicker.js"></script>
  <script src="/auth/vendor/countdowntime/countdowntime.js"></script>
  <script src="/auth/js/main.js"></script>

  @yield('scripts')
</body>

</html>
