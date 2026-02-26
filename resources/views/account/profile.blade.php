@extends('layouts.app')
@section('title', 'My Profile - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'My Account', 'url' => route('account.dashboard')], ['label' => 'Profile']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-text-dark mb-8">My Profile</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <x-account-sidebar />
            </div>

            <div class="lg:col-span-3 space-y-6">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">{{ session('success') }}</div>
                @endif

                {{-- Profile Info --}}
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-heading font-semibold text-text-dark mb-4">Profile Information</h2>
                    <form method="POST" action="{{ route('account.profile.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">Full Name</label>
                                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">Email</label>
                                <input type="email" value="{{ $user->email }}" disabled
                                       class="w-full px-4 py-2 border border-gray-200 rounded-lg bg-gray-50 text-dark-gray">
                            </div>
                        </div>

                        <div class="max-w-xs">
                            <label class="block text-sm font-medium text-dark-gray mb-1">Phone</label>
                            <input type="tel" name="phone" value="{{ old('phone', $user->phone) }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            @error('phone') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <button type="submit" class="btn-primary">Save Changes</button>
                    </form>
                </div>

                {{-- Change Password --}}
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-heading font-semibold text-text-dark mb-4">Change Password</h2>
                    <form method="POST" action="{{ route('account.password.update') }}" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div class="max-w-sm">
                            <label class="block text-sm font-medium text-dark-gray mb-1">Current Password</label>
                            <input type="password" name="current_password" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            @error('current_password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 max-w-lg">
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">New Password</label>
                                <input type="password" name="password" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                                @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">Confirm Password</label>
                                <input type="password" name="password_confirmation" required
                                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                        </div>

                        <button type="submit" class="btn-primary">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
