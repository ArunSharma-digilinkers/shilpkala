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
    <div class="min-h-screen flex flex-col lg:flex-row">
        {{-- Left Panel - Branding --}}
        <div class="hidden lg:flex lg:w-1/2 relative overflow-hidden">
            <img src="{{ asset('images/site/craft3.jpg') }}" alt="Handcrafted Indian Art" class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-black/70 via-black/50 to-primary/30"></div>
            <div class="relative z-10 flex flex-col justify-between p-12 text-white w-full">
                <div>
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/site/shilpkala.png') }}" alt="Shilpkala" class="h-16 object-contain bg-white rounded-lg p-2">
                    </a>
                </div>
                <div class="space-y-6">
                    <h1 class="text-4xl font-heading font-bold leading-tight">Handcrafted with Love,<br>Delivered with Care</h1>
                    <p class="text-lg text-white/80 max-w-md leading-relaxed">Discover authentic Indian handicrafts — from terracotta idols and traditional diyas to hand-painted artwork and decorative vases.</p>
                    <div class="flex items-center gap-8 text-sm text-white/70">
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            100% Handmade
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Artisan Direct
                        </span>
                        <span class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Eco-Friendly
                        </span>
                    </div>
                </div>
                <p class="text-sm text-white/50">&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
            </div>
        </div>

        {{-- Right Panel - Form --}}
        <div class="flex-1 flex flex-col justify-center items-center px-6 py-8 lg:px-12">
            {{-- Mobile logo --}}
            <div class="lg:hidden mb-6">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/site/shilpkala.png') }}" alt="Shilpkala" class="h-16 object-contain">
                </a>
            </div>

            <div class="w-full max-w-md">
                <div class="bg-white shadow-md rounded-xl px-8 py-8">
                    {{ $slot }}
                </div>

                <p class="mt-6 text-center text-sm text-light-gray lg:hidden">&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
