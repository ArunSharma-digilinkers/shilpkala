@extends('layouts.app')
@section('title', 'My Addresses - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'My Account', 'url' => route('account.dashboard')], ['label' => 'Addresses']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-text-dark mb-8">My Addresses</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <x-account-sidebar />
            </div>

            <div class="lg:col-span-3">
                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">{{ session('success') }}</div>
                @endif

                {{-- Existing Addresses --}}
                @if ($addresses->count())
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        @foreach ($addresses as $address)
                            <div class="bg-white rounded-lg shadow-sm p-5 relative">
                                <span class="inline-block px-2 py-0.5 text-xs rounded bg-gray-100 text-dark-gray uppercase mb-2">{{ $address->type }}</span>
                                <p class="font-medium text-text-dark">{{ $address->name }}</p>
                                <p class="text-sm text-dark-gray">{{ $address->address_line_1 }}</p>
                                @if ($address->address_line_2)
                                    <p class="text-sm text-dark-gray">{{ $address->address_line_2 }}</p>
                                @endif
                                <p class="text-sm text-dark-gray">{{ $address->city }}, {{ $address->state }} - {{ $address->pincode }}</p>
                                <p class="text-sm text-dark-gray">Phone: {{ $address->phone }}</p>

                                <div class="mt-3 flex gap-2">
                                    <form method="POST" action="{{ route('account.address.delete', $address) }}" class="inline"
                                          onsubmit="return confirm('Delete this address?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs text-red-600 hover:underline">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Add New Address --}}
                <div class="bg-white rounded-lg shadow-sm p-6" x-data="{ open: {{ $addresses->count() ? 'false' : 'true' }} }">
                    <button @click="open = !open" class="flex items-center justify-between w-full text-left">
                        <h2 class="text-lg font-heading font-semibold text-text-dark">Add New Address</h2>
                        <svg class="w-5 h-5 transform transition-transform" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <form method="POST" action="{{ route('account.address.store') }}" x-show="open" x-transition class="mt-4 space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-dark-gray mb-1">Type</label>
                            <select name="type" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="shipping">Shipping</option>
                                <option value="billing">Billing</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">Full Name</label>
                                <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">Phone</label>
                                <input type="tel" name="phone" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-gray mb-1">Address Line 1</label>
                            <input type="text" name="address_line_1" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-dark-gray mb-1">Address Line 2 (Optional)</label>
                            <input type="text" name="address_line_2" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">City</label>
                                <input type="text" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">State</label>
                                <input type="text" name="state" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-dark-gray mb-1">PIN Code</label>
                                <input type="text" name="pincode" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                            </div>
                        </div>

                        <button type="submit" class="btn-primary">Save Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
