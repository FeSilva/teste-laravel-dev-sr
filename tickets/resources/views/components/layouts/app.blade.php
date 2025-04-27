<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <title>@yield('title', 'Dashboard') | Ubold</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- Theme Config JS -->
        <script src="{{ asset('assets/js/head.js') }}"></script>
        <!-- CSS -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" id="app-style" />
        <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" />
        @stack('styles')
    </head>
    <body class="@yield('body-class', 'authentication-bg authentication-bg-pattern')">
        @yield('content')
        {{ $slot }}

        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by 
            <a href="#" class="text-white-50">Coderthemes</a>
        </footer>
        
        <script src="{{ asset('assets/js/pages/authentication.init.js') }}"></script>
            @stack('scripts')
        </body>
    </body>
</html>