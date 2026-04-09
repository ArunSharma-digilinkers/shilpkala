@extends('layouts.app')
@section('title', 'Contact Us - Shilpkala')

@if(config('services.recaptcha.site_key'))
    @push('scripts')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endpush
@endif

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Contact Us']]" />

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">Contact Us</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Contact Form --}}
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-heading font-semibold text-text-dark mb-4">Send us a Message</h2>

                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-dark-gray mb-1">Your Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-gray mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-gray mb-1">Phone (Optional)</label>
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-gray mb-1">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('subject') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-dark-gray mb-1">Message</label>
                        <textarea name="message" rows="5" required
                                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    @if(config('services.recaptcha.site_key'))
                        <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                        @error('g-recaptcha-response') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    @endif

                    <button type="submit" class="btn-primary w-full text-center">Send Message</button>
                </form>
            </div>

            {{-- Contact Info --}}
            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-heading font-semibold text-text-dark mb-4">Get in Touch</h2>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <div>
                                <p class="font-medium text-text-dark">Email</p>
                                <a href="mailto:info@shilpkalaworld.com" class="text-primary hover:underline">info@shilpkalaworld.com</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <div>
                                <p class="font-medium text-text-dark">Phone</p>
                                <a href="tel:+919876543210" class="text-primary hover:underline">+91 98765 43210</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <div>
                                <p class="font-medium text-text-dark">Address</p>
                                <p class="text-dark-gray">Pune, Maharashtra, India</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-heading font-semibold text-text-dark mb-4">Business Hours</h2>
                    <div class="space-y-2 text-sm text-dark-gray">
                        <div class="flex justify-between"><span>Monday - Friday</span><span class="font-medium">10:00 AM - 7:00 PM</span></div>
                        <div class="flex justify-between"><span>Saturday</span><span class="font-medium">10:00 AM - 5:00 PM</span></div>
                        <div class="flex justify-between"><span>Sunday</span><span class="font-medium text-red-500">Closed</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
