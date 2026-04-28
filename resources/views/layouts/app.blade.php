<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', $company_setting->company_name ?? 'SkyLink Solutions')</title>
        <meta name="description" content="@yield('meta_description', 'SkyLink Solutions - Digital Technology Company in Morogoro, Tanzania. Software Development, ICT Infrastructure, Security & Surveillance.')">

        <!-- Favicon -->
        <link rel="shortcut icon" href="{{ $company_setting->favicon ? asset('storage/' . $company_setting->favicon) : asset('favicon.ico') }}" type="image/x-icon">

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

        {{-- ===== Site Header ===== --}}
        @include('layouts.partials.header')

        {{-- ===== Page Content ===== --}}
        {{ $slot ?? '' }}
        @yield('content')

        {{-- ===== Site Footer ===== --}}
        @include('layouts.partials.footer')

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

        <script>
            $(document).ready(function() {
                // Smooth scrolling for anchor links
                $('a[href^="{{ url('/') }}#"]').on('click', function(e) {
                    var target = this.hash;
                    if (target) {
                        e.preventDefault();
                        var $target = $(target);
                        if ($target.length) {
                            $('html, body').stop().animate({
                                'scrollTop': $target.offset().top - 80 // Adjust for header height
                            }, 900, 'swing');
                        }
                    }
                });

                // Handle hash on page load
                if (window.location.hash) {
                    setTimeout(function() {
                        var $target = $(window.location.hash);
                        if ($target.length) {
                            $('html, body').stop().animate({
                                'scrollTop': $target.offset().top - 80
                            }, 900, 'swing');
                        }
                    }, 500);
                }
            });
        </script>

        <!-- ===== Per-page extra scripts ===== -->
        @stack('scripts')

        <!-- ===== Livewire Scripts ===== -->
        @livewireScripts
    </body>
</html>
