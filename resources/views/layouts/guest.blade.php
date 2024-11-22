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
</head>

<body class="font-sans text-gray-900 antialiased"
    style="background-image: url('{{ asset('assets/img/login_bg.png') }}'); background-size: cover; background-repeat: no-repeat; background-position: center;">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
        <div
            class="flex flex-col items-center space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6 justify-center sm:rounded-lg sm:p-8 p-6">
            <!-- Logo -->
            <div class="sm:mr-16">
                <a href="">
                    <x-application-logo class="w-16 h-16 fill-current text-gray-500"/>
                </a>
            </div>

            <!-- Slot -->
            <div class="w-full sm:max-w-md px-4 py-6">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>



</html>
