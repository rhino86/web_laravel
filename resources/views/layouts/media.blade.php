<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>KOL Management | {{ $page_title }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
    <!-- CSS Libraries -->
    {{-- <link rel="stylesheet" href="{{ asset('theme/node_modules/bootstrap-social/bootstrap-social.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/node_modules/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/node_modules/weathericons/css/weather-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/node_modules/weathericons/css/weather-icons-wind.min.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/node_modules/summernote/dist/summernote-bs4.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datepicker/css/bootstrap-datepicker.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('theme/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            @include('nav/nav-media')

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">

                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> <a href="https://rwe.co.id/" class="mr-2">KOL Management</a>RWE Digital Agency
                </div>
                <div class="footer-right">
                    v2.0.0
                </div>
            </footer>
        </div>
    </div>
    @yield('modal')
    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{ asset('vendors/jquery-number/jquery.number.min.js') }}"></script>
    {{-- <script src="{{ asset('theme/node_modules/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('theme/node_modules/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('theme/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('theme/node_modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('theme/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('theme/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script> --}}
    <script src="https://kit.fontawesome.com/ee93fea493.js" crossorigin="anonymous"></script>
    <script src="{{ asset('vendors/select2/js/select2.js') }}"></script>
    <script src="{{ asset('vendors/datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('theme/js/stisla.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('theme/js/scripts.js') }}"></script>
    <script src="{{ asset('theme/js/custom.js') }}"></script>
    {{-- custome javascript --}}
    <script src="{{ asset('common/js/custome.js') }}"></script>
    @yield('script')
</body>

</html>