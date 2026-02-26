@extends('layouts.app')
@section('title', 'My Orders - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'My Account', 'url' => route('account.dashboard')], ['label' => 'Orders']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-text-dark mb-8">My Orders</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <x-account-sidebar />
            </div>

            <div class="lg:col-span-3">
                @if ($orders->count())
                    <div class="space-y-4">
                        @foreach ($orders as $order)
                            <div class="bg-white rounded-lg shadow-sm p-6">
                                <div class="flex flex-wrap items-center justify-between gap-4 mb-3">
                                    <div>
                                        <span class="font-medium text-text-dark">{{ $order->order_number }}</span>
                                        <span class="text-sm text-dark-gray ml-2">{{ $order->created_at->format('d M Y, h:i A') }}</span>
                                    </div>
                                    <span class="inline-block px-3 py-1 text-xs rounded-full font-medium
                                        {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : '' }}
                                        {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                        {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : '' }}
                                        {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                <div class="flex flex-wrap items-center justify-between gap-4">
                                    <div class="text-sm text-dark-gray">
                                        <span>Payment: <strong>{{ ucfirst($order->payment_status) }}</strong></span>
                                        <span class="mx-2">|</span>
                                        <span>{{ ucfirst(str_replace('_', ' ', $order->payment_method)) }}</span>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <span class="font-heading font-bold text-lg text-text-dark">₹{{ number_format($order->grand_total, 2) }}</span>
                                        <a href="{{ route('account.order.detail', $order->order_number) }}" class="btn-outline text-sm !py-1 !px-4">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        {{ $orders->links() }}
                    </div>
                @else
                    <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                        <p class="text-dark-gray text-lg mb-4">You haven't placed any orders yet.</p>
                        <a href="{{ route('shop.index') }}" class="btn-primary inline-block">Start Shopping</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
