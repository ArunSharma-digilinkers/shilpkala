<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Shilpkala'))</title>

    <link rel="icon" href="{{ asset('images/site/favicon.png') }}" type="image/png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Raleway:wght@300;400;500;600;700&family=Fira+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-bg-light font-body antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="mb-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/site/shilpkala.png') }}" alt="Shilpkala" class="h-20 object-contain">
            </a>
        </div>

        <div class="w-full sm:max-w-md px-6 py-6 bg-white shadow-md rounded-lg">
            {{ $slot }}
        </div>

        <p class="mt-6 text-sm text-light-gray">&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
    </div>
</body>
</html>
