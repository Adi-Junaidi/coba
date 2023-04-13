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
    <div class="container py-5">
      <div class="row">
        <div class="col-md-6">
          <h5 class="text-uppercase text-white">{{ env('APP_NAME') }}</h5>
          <ul class="ps-0" style="list-style: none">
            <li class="mb-2">
              <a href="https://goo.gl/maps/ReUEFLv3WMQt7Mby9" style="color: #fff8; text-decoration: none">Jl. Jkt No.1, Huangobotu, Dungingi, Kota Gorontalo, Gorontalo
                96138</a>
            </li>
            <li class="mb-2">
              <a href="tel:08114356001" style="color: #fff8; text-decoration: none">08114356001</a>
            </li>
            <li class="mb-2">
              <a href="mailto:gorontalojapesda@gmail.com" style="color: #fff8; text-decoration: none">gorontalojapesda@gmail.com</a>
            </li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5 class="text-uppercase text-white">Jam Kerja</h5>
          <ul class="ps-0" style="list-style: none">
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Mon - Fri : 08:00 - 17:00
            </li>
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Sat : 09:00 - 15:00
            </li>
            <li class="mb-2" style="color: #fff8; text-decoration: none">
              Sun : Close
            </li>
          </ul>
        </div>

        <div class="col-md-3">
          <h5 class="text-uppercase text-white">Follow Us On</h5>
          <ul class="ps-0" style="list-style: none">
            <li class="mb-2">
              <a href="https://www.facebook.com/japesdajo/" style="color: #fff8; text-decoration: none">Facebook</a>
            </li>
            <li class="mb-2">
              <a href="https://www.instagram.com/japesda/" style="color: #fff8; text-decoration: none">Instagram</a>
            </li>
            <li class="mb-2">
              <a href="https://www.youtube.com/channel/UCVw2XaXImZTOz3q3X5KjQ6w" style="color: #fff8; text-decoration: none">YouTube</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="d-flex flex-column align-items-center py-3 text-white" style="background-color: #0008">
      <span>Copyright &copy; 2023</span>
    </div>
  </footer>

  <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
