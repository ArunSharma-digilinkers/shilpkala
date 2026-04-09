<x-guest-layout>
    @if(config('services.recaptcha.site_key'))
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    @endif

    <h2 class="text-2xl font-heading font-bold text-text-dark text-center mb-6">Sign In</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-dark-gray mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-dark-gray mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="flex items-center justify-between mb-4">
            <label class="inline-flex items-center">
                <input type="checkbox" name="remember" class="rounded border-gray-300 text-primary focus:ring-primary">
                <span class="ml-2 text-sm text-dark-gray">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-primary hover:underline">Forgot password?</a>
            @endif
        </div>

        @if(config('services.recaptcha.site_key'))
        <div class="mb-4">
            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
            <x-input-error :messages="$errors->get('g-recaptcha-response')" class="mt-1" />
        </div>
        @endif

        <button type="submit" class="btn-primary w-full text-center">Sign In</button>

        <p class="mt-4 text-center text-sm text-dark-gray">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-primary hover:underline font-medium">Register</a>
        </p>
    </form>
</x-guest-layout>
