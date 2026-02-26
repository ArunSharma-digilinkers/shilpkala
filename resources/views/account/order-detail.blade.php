@extends('layouts.app')
@section('title', 'Order ' . $order->order_number . ' - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[
        ['label' => 'My Account', 'url' => route('account.dashboard')],
        ['label' => 'Orders', 'url' => route('account.orders')],
        ['label' => $order->order_number]
    ]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
            <h1 class="text-2xl md:text-3xl font-heading font-bold text-text-dark">Order {{ $order->order_number }}</h1>
            <span class="inline-block px-4 py-2 text-sm rounded-full font-medium
                {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : '' }}
                {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-700' : '' }}
                {{ $order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : '' }}
                {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                {{ ucfirst($order->status) }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <x-account-sidebar />
            </div>

            <div class="lg:col-span-3 space-y-6">
                {{-- Order Items --}}
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-heading font-semibold text-text-dark mb-4">Items Ordered</h2>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b text-left text-dark-gray">
                                    <th class="pb-3 font-medium">Product</th>
                                    <th class="pb-3 font-medium text-center">Qty</th>
                                    <th class="pb-3 font-medium text-right">Price</th>
                                    <th class="pb-3 font-medium text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="border-b last:border-0">
                                        <td class="py-3">
                                            @if ($item->product)
                                                <a href="{{ route('shop.show', $item->product->slug) }}" class="text-primary hover:underline">{{ $item->product_name }}</a>
                                            @else
                                                {{ $item->product_name }}
                                            @endif
                                        </td>
                                        <td class="py-3 text-center">{{ $item->quantity }}</td>
                                        <td class="py-3 text-right">₹{{ number_format($item->unit_price, 2) }}</td>
                                        <td class="py-3 text-right font-medium">₹{{ number_format($item->total_price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-lg font-heading font-semibold text-text-dark mb-4">Order Summary</h2>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span class="text-dark-gray">Subtotal</span><span>₹{{ number_format($order->subtotal, 2) }}</span></div>
                        <div class="flex justify-between"><span class="text-dark-gray">Shipping</span><span>₹{{ number_format($order->shipping_total, 2) }}</span></div>
                        @if ($order->discount_total > 0)
                            <div class="flex justify-between text-green-600"><span>Discount</span><span>-₹{{ number_format($order->discount_total, 2) }}</span></div>
                        @endif
                        <div class="flex justify-between border-t pt-2 text-base font-bold text-text-dark">
                            <span>Total</span><span>₹{{ number_format($order->grand_total, 2) }}</span>
                        </div>
                    </div>
                </div>

                {{-- Payment & Address --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-heading font-semibold text-text-dark mb-3">Payment</h2>
                        <p class="text-sm text-dark-gray">Method: <strong>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</strong></p>
                        <p class="text-sm text-dark-gray">Status: <strong>{{ ucfirst($order->payment_status) }}</strong></p>
                        @if ($order->payment_id)
                            <p class="text-sm text-dark-gray">ID: {{ $order->payment_id }}</p>
                        @endif
                        <p class="text-sm text-dark-gray mt-2">Date: {{ $order->created_at->format('d M Y, h:i A') }}</p>
                    </div>

                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="text-lg font-heading font-semibold text-text-dark mb-3">Shipping Address</h2>
                        <p class="text-sm text-dark-gray">{{ $order->shipping_name }}</p>
                        <p class="text-sm text-dark-gray">{{ $order->shipping_address_line_1 }}</p>
                        @if ($order->shipping_address_line_2)
                            <p class="text-sm text-dark-gray">{{ $order->shipping_address_line_2 }}</p>
                        @endif
                        <p class="text-sm text-dark-gray">{{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}</p>
                        <p class="text-sm text-dark-gray">Phone: {{ $order->shipping_phone }}</p>
                    </div>
                </div>

                <a href="{{ route('account.orders') }}" class="inline-flex items-center text-primary hover:underline text-sm">
                    &larr; Back to Orders
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
