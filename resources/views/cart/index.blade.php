@extends('layouts.app')

@section('title', 'Cart - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Home', 'url' => url('/')], ['label' => 'Cart']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="font-heading text-3xl font-bold text-text-dark mb-8">Shopping Cart</h1>

        @if(session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-md mb-6">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-md mb-6">{{ session('error') }}</div>
        @endif

        @if(count($items) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Cart Items --}}
            <div class="lg:col-span-2 space-y-4">
                @foreach($items as $id => $item)
                <div class="bg-white rounded-lg shadow-sm p-4">
                    <div class="flex gap-4">
                        <a href="{{ url('/shop/' . $item['slug']) }}" class="shrink-0">
                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded-md">
                        </a>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-heading font-semibold text-text-dark truncate">
                                <a href="{{ url('/shop/' . $item['slug']) }}" class="hover:text-primary">{{ $item['name'] }}</a>
                            </h3>
                            <p class="text-primary font-ui font-bold mt-1">&#8377;{{ number_format($item['price']) }}</p>
                        </div>
                        {{-- Remove button (mobile-friendly position) --}}
                        <form action="{{ route('cart.remove') }}" method="POST" class="shrink-0">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <button type="submit" class="text-red-400 hover:text-red-600 p-1 cursor-pointer" title="Remove">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            </button>
                        </form>
                    </div>
                    {{-- Quantity & subtotal row --}}
                    <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-100">
                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center border border-gray-300 rounded-md">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <button type="submit" name="quantity" value="{{ max(0, $item['quantity'] - 1) }}" class="px-3 py-1.5 text-gray-500 hover:text-primary cursor-pointer">-</button>
                            <span class="px-3 py-1.5 text-sm font-medium">{{ $item['quantity'] }}</span>
                            <button type="submit" name="quantity" value="{{ min($item['max_stock'], $item['quantity'] + 1) }}" class="px-3 py-1.5 text-gray-500 hover:text-primary cursor-pointer">+</button>
                        </form>
                        <span class="font-ui font-bold text-text-dark">&#8377;{{ number_format($item['price'] * $item['quantity']) }}</span>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Order Summary --}}
            <div class="bg-white rounded-lg shadow-sm p-6 h-fit sticky top-24">
                <h2 class="font-heading text-xl font-bold text-text-dark mb-4">Order Summary</h2>

                {{-- Coupon --}}
                @if($coupon)
                    <div class="flex items-center justify-between bg-green-50 px-3 py-2 rounded-md mb-4">
                        <span class="text-green-700 text-sm font-medium">{{ $coupon['code'] }}</span>
                        <form action="{{ route('cart.removeCoupon') }}" method="POST">
                            @csrf
                            <button class="text-red-400 hover:text-red-600 text-sm cursor-pointer">Remove</button>
                        </form>
                    </div>
                @else
                    <form action="{{ route('cart.applyCoupon') }}" method="POST" class="flex gap-2 mb-4">
                        @csrf
                        <input type="text" name="coupon_code" placeholder="Coupon code"
                               class="flex-1 border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                        <button type="submit" class="bg-dark-gray text-white px-4 py-2 rounded-md text-sm font-ui font-medium hover:bg-gray-700 cursor-pointer">Apply</button>
                    </form>
                @endif

                <div class="space-y-3 text-sm border-t border-gray-100 pt-4">
                    <div class="flex justify-between"><span class="text-light-gray">Subtotal</span><span class="font-medium">&#8377;{{ number_format($subtotal) }}</span></div>
                    @if($discount > 0)
                    <div class="flex justify-between"><span class="text-green-600">Discount</span><span class="text-green-600 font-medium">-&#8377;{{ number_format($discount) }}</span></div>
                    @endif
                    <div class="flex justify-between"><span class="text-light-gray">Shipping</span><span class="font-medium">{{ $shipping > 0 ? '₹' . number_format($shipping) : 'Free' }}</span></div>
                    <div class="flex justify-between border-t border-gray-100 pt-3 text-lg font-bold">
                        <span>Total</span><span class="text-primary">&#8377;{{ number_format($total) }}</span>
                    </div>
                </div>

                <a href="{{ route('checkout.index') }}" class="btn-primary w-full text-center mt-6 block">Proceed to Checkout</a>
                <a href="{{ url('/shop') }}" class="block text-center text-light-gray text-sm mt-3 hover:text-primary">Continue Shopping</a>
            </div>
        </div>
        @else
        <div class="text-center py-16">
            <svg class="mx-auto h-16 w-16 text-light-gray mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
            <p class="text-light-gray text-lg mb-4">Your cart is empty.</p>
            <a href="{{ url('/shop') }}" class="btn-primary">Start Shopping</a>
        </div>
        @endif
    </div>
</div>
@endsection
