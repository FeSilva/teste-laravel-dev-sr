<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Login') Cellar Vinhos | Teste laravel Sr</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Painel administrativo" name="description" />
    <meta content="Coderthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Head JS -->
    <script src="{{ asset('assets/js/head.js') }}"></script>

    <!-- CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" id="app-style" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>

    <footer class="footer footer-alt">
       <script>document.write(new Date().getFullYear())</script> &copy;Desenvolvido por &nbsp;<a href="https://github.com/FeSilva" _target='blank' class="text-white-50"> Felipe Feitosa da Silva</a>
    </footer>
    <!-- Vendor js (jQuery/Bootstrap/etc.) -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <!-- App js (app-wide) -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Authentication page init (olhinho do password) -->
    <script src="{{ asset('assets/js/pages/authentication.init.js') }}"></script>


    @stack('scripts')
</body>
</html>
