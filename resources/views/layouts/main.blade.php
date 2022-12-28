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

    @yield('link')
</head>

<body>

@include('partials.sidebar')

<div class="container-fluid">
    @yield('container')
</div>

<footer class="container-fluid">
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-end me-4">
            <p>2022 &copy; BKKBN</p>
        </div>
    </div>
</footer>
</div>
</div>
<script src="{{ asset('dist') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('dist') }}/assets/js/app.js"></script>
    
<!-- Need: Apexcharts -->
<script src="{{ asset('dist') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('dist') }}/assets/js/pages/dashboard.js"></script>
@yield('script')

</body>

</html>
    