<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'SkyLink Solutions'))</title>

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- ===== Core CSS ===== -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('css/jquery.nice-number.min.css') }}">
        <!-- Main Theme CSS (must come last to override) -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

        <!-- ===== Per-page extra styles ===== -->
        @stack('styles')

        <!-- ===== Livewire Styles ===== -->
        @livewireStyles
    </head>
    <body>

        {{-- Livewire navigation (Jetstream) --}}
        @livewire('navigation-menu')

        <!-- ===== Page Content ===== -->
        {{ $slot ?? '' }}
        @yield('content')

        @stack('modals')

        <!-- ===== Core JS ===== -->
        <!-- jQuery first -->
        <script src="{{ asset('js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('js/vendor/modernizr-3.6.0.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- Plugins -->
        <script src="{{ asset('js/slick.min.js') }}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('js/jquery.nice-number.min.js') }}"></script>
        <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('js/waypoints.min.js') }}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('js/validator.min.js') }}"></script>
        <!-- Main theme JS -->
        <script src="{{ asset('js/main.js') }}"></script>

        <!-- ===== Per-page extra scripts ===== -->
        @stack('scripts')

        <!-- ===== Livewire Scripts ===== -->
        @livewireScripts
    </body>
</html>
