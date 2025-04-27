<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Dashboard') | Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Painel Administrativo" name="description" />
    <meta content="SuaEmpresa" name="author" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Plugins css -->
    <link href="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- App css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Head.js -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    @stack('styles')
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Sidebar Menu -->
        @include('layouts.partials.sidebar')

        <!-- Content Page -->
        <div class="content-page">

            <!-- Topbar -->
            @include('layouts.partials.topbar')

            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <!-- Footer -->
            @include('layouts.partials.footer')

        </div> <!-- End Content Page -->

    </div> <!-- End wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Plugins js -->
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js') }}"></script>

    <!-- Apexcharts Plugin -->
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Apexcharts Init (para gráficos prontos) -->
    <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>

    <!-- Dashboard 2 init (para Dashboard 2) -->
    <script src="{{ asset('assets/js/pages/dashboard-2.init.js') }}"></script>

    @stack('scripts')

</body>

</html>
