<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <!-- SweetAlert2 -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <style>
            .swal2-container .nice-select.swal2-select { display: none !important; }
        </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });

            @if (session('success'))
                Toast.fire({
                    icon: 'success',
                    title: '{{ session('success') }}'
                });
            @endif

            @if (session('error'))
                Toast.fire({
                    icon: 'error',
                    title: '{{ session('error') }}'
                });
            @endif

            @if (session('status'))
                Toast.fire({
                    icon: 'info',
                    title: '{{ session('status') }}'
                });
            @endif

            // Global File Size Validation (1MB limit)
            const MAX_FILE_SIZE = 1048576; // 1MB in bytes

            // Block on file selection
            document.addEventListener('change', function(e) {
                if (e.target.tagName === 'INPUT' && e.target.type === 'file') {
                    const file = e.target.files[0];
                    if (file && file.size > MAX_FILE_SIZE) {
                        Swal.fire({
                            icon: 'error',
                            title: 'File Too Large',
                            html: '<p>The selected file <strong>' + file.name + '</strong> is <strong>' + (file.size / 1048576).toFixed(2) + 'MB</strong>.</p><p>Please upload a file smaller than <strong>1MB</strong>.</p>',
                            confirmButtonColor: '#3b82f6',
                            confirmButtonText: 'OK, choose another file'
                        });
                        e.target.value = '';
                        e.target.dataset.invalid = 'true';
                    } else if (e.target.dataset.invalid) {
                        delete e.target.dataset.invalid;
                    }
                }
            });

            // Block form submission if any file input is still oversized
            document.addEventListener('submit', function(e) {
                const fileInputs = e.target.querySelectorAll('input[type="file"]');
                for (let input of fileInputs) {
                    const file = input.files[0];
                    if (file && file.size > MAX_FILE_SIZE) {
                        e.preventDefault();
                        Swal.fire({
                            icon: 'error',
                            title: 'File Too Large',
                            html: '<p>The file <strong>' + file.name + '</strong> is <strong>' + (file.size / 1048576).toFixed(2) + 'MB</strong>.</p><p>Please upload a file smaller than <strong>1MB</strong>.</p>',
                            confirmButtonColor: '#3b82f6',
                            confirmButtonText: 'OK, choose another file'
                        });
                        input.value = '';
                        input.focus();
                        return;
                    }
                }
            });
        </script>
    </body>
</html>
