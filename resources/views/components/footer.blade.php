{{-- Footer --}}
<footer class="bg-dark-gray text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Brand --}}
            <div>
                <a href="{{ url('/') }}" class="inline-block mb-4 bg-white rounded-lg p-3">
                    <img src="{{ asset('images/site/shilpkala.png') }}" alt="Shilpkala - Handcrafted Creations"
                         class="h-16 object-contain">
                </a>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Authentic Indian Handicraft. Handcrafted with love and tradition, each piece tells a story of India's rich cultural heritage.
                </p>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="font-ui font-semibold text-lg mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ url('/shop') }}" class="text-gray-300 hover:text-primary transition-colors">Shop</a></li>
                    <li><a href="{{ url('/about') }}" class="text-gray-300 hover:text-primary transition-colors">About Us</a></li>
                    <li><a href="{{ url('/contact') }}" class="text-gray-300 hover:text-primary transition-colors">Contact Us</a></li>
                    <li><a href="{{ url('/faq') }}" class="text-gray-300 hover:text-primary transition-colors">FAQ</a></li>
                    <li><a href="{{ url('/shipping-returns') }}" class="text-gray-300 hover:text-primary transition-colors">Shipping & Returns</a></li>
                </ul>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="font-ui font-semibold text-lg mb-4">Contact Us</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li class="flex items-start gap-2">
                        <svg class="h-5 w-5 text-primary mt-0.5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        <span>113, Evergreen Apartments, Sector-7, Plot No.-9, Dwarka, New Delhi-110075</span>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        <a href="mailto:sudhasharma9868@gmail.com" class="hover:text-primary transition-colors">sudhasharma9868@gmail.com</a>
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="h-5 w-5 text-primary shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        <span>+91-9868105731 / +91-9868205731</span>
                    </li>
                </ul>

                {{-- Social Links --}}
                <div class="flex gap-4 mt-4">
                    <a href="https://www.instagram.com/shilp_kala" target="_blank" rel="noopener" class="text-gray-300 hover:text-primary transition-colors" aria-label="Instagram">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                    <a href="https://www.facebook.com/shilpkala" target="_blank" rel="noopener" class="text-gray-300 hover:text-primary transition-colors" aria-label="Facebook">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://www.pinterest.com/shilpkala" target="_blank" rel="noopener" class="text-gray-300 hover:text-primary transition-colors" aria-label="Pinterest">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12.017 24c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641 0 12.017 0z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Copyright --}}
    <div class="border-t border-gray-500/30">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center text-sm text-gray-400">
            <p>&copy; {{ date('Y') }} Shilpkala. All rights reserved.</p>
            <p class="mt-1">
                <a href="{{ route('privacy-policy') }}" class="hover:text-primary transition-colors">Privacy Policy</a>
                <span class="mx-1.5">|</span>
                <a href="{{ route('terms-of-service') }}" class="hover:text-primary transition-colors">Terms of Service</a>
                <span class="mx-1.5">|</span>
                Crafted by <a href="https://digilinkers.com" target="_blank" rel="noopener" class="hover:text-primary transition-colors">Digilinkers</a>
            </p>
        </div>
    </div>
</footer>
