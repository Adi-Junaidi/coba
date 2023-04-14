<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link href="{{ asset('dist/assets/css/main/app.css') }}" rel="stylesheet" />

  <link type="image/x-icon" href="{{ asset('dist/assets/images/logo/favicon.svg') }}" rel="shortcut icon" />

  <!-- CSS to make the footer stays at the bottom of the page even when the content of the body is empty -->
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    body>*:not(:where(footer, .navbar)) {
      flex: 1;
    }
  </style>

  <title>{{ env('APP_NAME') }}</title>
</head>

<body>
  @include('partials.landing.navbar')

  @yield('main')

  <span></span> <!-- FIXME: this is required so the footer stays at the bottom of the page even when the content of the body is empty -->
  <footer class="bg-primary">
    <div class="d-flex flex-column align-items-center py-3 text-white" style="background-color: #000a">
      <span>Copyright &copy; 2023</span>
    </div>
  </footer>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
