<x-guest-layout>
    <h2 class="text-2xl font-heading font-bold text-text-dark text-center mb-6">Create Account</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-dark-gray mb-1">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('name')" class="mt-1" />
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-dark-gray mb-1">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('email')" class="mt-1" />
        </div>

        <div class="mb-4">
            <label for="phone" class="block text-sm font-medium text-dark-gray mb-1">Phone (Optional)</label>
            <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" autocomplete="tel"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-dark-gray mb-1">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('password')" class="mt-1" />
        </div>

        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm font-medium text-dark-gray mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <button type="submit" class="btn-primary w-full text-center">Create Account</button>

        <p class="mt-4 text-center text-sm text-dark-gray">
            Already have an account?
            <a href="{{ route('login') }}" class="text-primary hover:underline font-medium">Sign In</a>
        </p>
    </form>
</x-guest-layout>
