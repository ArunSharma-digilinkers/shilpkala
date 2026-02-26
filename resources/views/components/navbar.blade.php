{{-- Sticky navbar: transparent-over-hero on homepage, solid white on all other pages --}}
@props(['transparent' => false])

<nav x-data="{ open: false, scrolled: false, transparent: {{ $transparent ? 'true' : 'false' }} }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })"
     :class="(scrolled || !transparent) ? 'bg-white shadow-sm py-2' : 'py-4'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ url('/') }}" class="flex items-center">
                <img src="{{ asset('images/site/shilpkala.png') }}" alt="Shilpkala - Handcrafted Creations"
                     class="object-contain transition-all"
                     :class="(scrolled || !transparent) ? 'h-12' : 'h-14'">
            </a>

            {{-- Desktop Nav --}}
            <div class="hidden md:flex items-center gap-8">
                <a href="{{ url('/') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Home</a>
                <a href="{{ url('/shop') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Shop</a>
                <a href="{{ url('/about') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">About</a>
                <a href="{{ url('/contact') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Contact</a>

                @auth
                    <a href="{{ url('/account') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Account</a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Admin</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">Login</a>
                @endauth

                {{-- Cart Icon --}}
                <a href="{{ url('/cart') }}" class="relative font-ui text-base font-medium transition-colors hover:text-primary" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                    </svg>
                    @if(($cartCount ?? 0) > 0)
                    <span class="absolute -top-2 -right-2 bg-primary text-white text-xs rounded-full h-5 w-5 flex items-center justify-center font-bold">{{ $cartCount }}</span>
                    @endif
                </a>
            </div>

            {{-- Mobile menu button --}}
            <button @click="open = !open" class="md:hidden transition-colors" :class="(scrolled || !transparent) ? 'text-text-dark' : 'text-white'">
                <svg x-show="!open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                <svg x-show="open" x-cloak class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>

        {{-- Mobile Nav --}}
        <div x-show="open" x-cloak x-transition class="md:hidden mt-4 pb-4 border-t border-gray-200">
            <div class="flex flex-col gap-3 pt-4">
                <a href="{{ url('/') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Home</a>
                <a href="{{ url('/shop') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Shop</a>
                <a href="{{ url('/about') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">About</a>
                <a href="{{ url('/contact') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Contact</a>
                @auth
                    <a href="{{ url('/account') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Account</a>
                    @if (auth()->user()->isAdmin())
                        <a href="{{ url('/admin') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Admin</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Login</a>
                @endauth
                <a href="{{ url('/cart') }}" class="font-ui text-sm font-medium text-text-dark hover:text-primary">Cart @if(($cartCount ?? 0) > 0)({{ $cartCount }})@endif</a>
            </div>
        </div>
    </div>
</nav>
