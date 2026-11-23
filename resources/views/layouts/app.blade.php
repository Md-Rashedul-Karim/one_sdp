<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <title>Login - ONE SDP Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">


    {{-- <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> --}}


    <!-- Css -->

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="min-vh-100 bg-light pb-2">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow-sm">
                <div class="container py-4">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="container">
            {{ $slot }}
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let myModalEl = document.querySelector('[data-modal="1"]');
        if (myModalEl) {
            const myModal = new bootstrap.Modal(myModalEl);
            myModal.show();
        }
    </script>

    <script>
        $(document).ready(function() {
            function showToast(msg) {
                const toast = $(`<div class="pointer-events-auto px-4 py-2.5 rounded-lg shadow-lg bg-blue-600 text-white text-xs font-medium">${msg}</div>`);
                $('#toast-container').append(toast);
                setTimeout(() => toast.remove(), 2500);
            }
            $('#toggle-password').on('click', function() {
                const $pwd = $('#login-password');
                $pwd.attr('type', $pwd.attr('type') === 'password' ? 'text' : 'password');
            });
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                const u = $.trim($('#login-username').val());
                if(!u) { $('#login-error').removeClass('hidden'); return; }
                sessionStorage.setItem('onesdp_logged_in', 'true');
                sessionStorage.setItem('onesdp_user_email', u.includes('@') ? u : u + '@onesdp.com');
                window.location.href = 'home.html';
            });
            $('#quick-demo-login').on('click', function() {
                sessionStorage.setItem('onesdp_logged_in', 'true');
                sessionStorage.setItem('onesdp_user_email', 'rayhan@onesdp.com');
                window.location.href = 'home.html';
            });
            $('#forgot-pass-btn').on('click', function() {
                showToast('Password reset link sent to your registered email.');
            });
        });
    </script>
</body>

</html>
