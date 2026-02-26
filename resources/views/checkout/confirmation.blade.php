@extends('layouts.app')

@section('title', 'Order Confirmed - Shilpkala')

@section('content')
<div class="pt-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 text-center">
        <div class="bg-white rounded-lg shadow-sm p-8">
            <svg class="mx-auto h-16 w-16 text-green-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>

            <h1 class="font-heading text-3xl font-bold text-text-dark mb-2">Thank You!</h1>
            <p class="text-light-gray mb-6">Your order has been placed successfully.</p>

            <div class="bg-bg-light rounded-md p-4 mb-6 inline-block">
                <p class="text-sm text-light-gray">Order Number</p>
                <p class="font-ui font-bold text-xl text-primary">{{ $order->order_number }}</p>
            </div>

            {{-- Order Details --}}
            <div class="text-left border-t border-gray-100 pt-6 mt-6">
                <h2 class="font-heading text-lg font-bold text-text-dark mb-4">Order Details</h2>
                <div class="space-y-2 mb-4">
                    @foreach($order->items as $item)
                    <div class="flex justify-between text-sm">
                        <span>{{ $item->product_name }} x {{ $item->quantity }}</span>
                        <span class="font-medium">&#8377;{{ number_format($item->total_price) }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="border-t border-gray-100 pt-3 space-y-1 text-sm">
                    <div class="flex justify-between"><span class="text-light-gray">Subtotal</span><span>&#8377;{{ number_format($order->subtotal) }}</span></div>
                    @if($order->discount_total > 0)
                    <div class="flex justify-between"><span class="text-green-600">Discount</span><span class="text-green-600">-&#8377;{{ number_format($order->discount_total) }}</span></div>
                    @endif
                    <div class="flex justify-between"><span class="text-light-gray">Shipping</span><span>{{ $order->shipping_total > 0 ? '₹' . number_format($order->shipping_total) : 'Free' }}</span></div>
                    <div class="flex justify-between font-bold text-lg pt-2 border-t border-gray-100">
                        <span>Total</span><span class="text-primary">&#8377;{{ number_format($order->grand_total) }}</span>
                    </div>
                </div>
            </div>

            {{-- Shipping Address --}}
            <div class="text-left border-t border-gray-100 pt-6 mt-6">
                <h2 class="font-heading text-lg font-bold text-text-dark mb-2">Shipping To</h2>
                <p class="text-sm text-text-dark">{{ $order->shipping_name }}</p>
                <p class="text-sm text-light-gray">{{ $order->shipping_address_line_1 }}</p>
                @if($order->shipping_address_line_2)
                <p class="text-sm text-light-gray">{{ $order->shipping_address_line_2 }}</p>
                @endif
                <p class="text-sm text-light-gray">{{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}</p>
            </div>

            <div class="mt-8 flex gap-4 justify-center">
                <a href="{{ url('/shop') }}" class="btn-primary">Continue Shopping</a>
                @auth
                <a href="{{ url('/account/orders') }}" class="btn-outline">View Orders</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
