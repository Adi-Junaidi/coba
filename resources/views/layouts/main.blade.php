<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SI PIK-R | {{ $title }}</title>

  <link href="{{ asset('dist') }}/assets/css/main/app.css" rel="stylesheet">
  <link href="{{ asset('dist') }}/assets/css/main/app-dark.css" rel="stylesheet">
  <link type="image/x-icon" href="{{ asset('dist') }}/assets/images/logo/favicon.svg" rel="shortcut icon">
  <link type="image/png" href="{{ asset('dist') }}/assets/images/logo/favicon.png" rel="shortcut icon">
  <link href="{{ asset('dist') }}/assets/css/shared/iconly.css" rel="stylesheet">

  <!-- Page Style -->
  @yield('link')
</head>

<body>
  @include('partials.sidebar')

  <div class="container-fluid">
    <div class='layout-navbar' id="main">
      @include('partials.navbar')
      @include('sweetalert::alert')

      <div id="main-content">
        @include('partials.heading', [
            'heading' => $heading,
            'breadcrumb' => $breadcrumb,
        ])

        <div class="page-content">
          @yield('container')
        </div>
      </div>

      @yield('modals')
    </div>
  </div>

  <footer class="container-fluid">
    <div class="footer clearfix text-muted mb-0">
      <div class="float-end me-4">
        <p>2022 &copy; BKKBN</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('dist') }}/assets/js/bootstrap.js"></script>
  <script src="{{ asset('dist') }}/assets/js/app.js"></script>

  <!-- Need: Apexcharts -->
  <script src="{{ asset('dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>

  <!-- Page Script -->
  @yield('script')
</body>

</html>
