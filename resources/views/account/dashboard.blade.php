@extends('layouts.app')
@section('title', 'My Account - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'My Account']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-2xl md:text-3xl font-heading font-bold text-text-dark mb-8">Welcome, {{ $user->name }}!</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <div class="lg:col-span-1">
                <x-account-sidebar />
            </div>

            <div class="lg:col-span-3">
                {{-- Stats --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <p class="text-3xl font-bold text-primary">{{ $totalOrders }}</p>
                        <p class="text-sm text-dark-gray mt-1">Total Orders</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <p class="text-3xl font-bold text-primary">{{ $addresses }}</p>
                        <p class="text-sm text-dark-gray mt-1">Saved Addresses</p>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                        <p class="text-3xl font-bold text-primary">{{ $user->created_at->format('M Y') }}</p>
                        <p class="text-sm text-dark-gray mt-1">Member Since</p>
                    </div>
                </div>

                {{-- Recent Orders --}}
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-heading font-semibold text-text-dark mb-4">Recent Orders</h2>

                    @if ($recentOrders->count())
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead>
                                    <tr class="border-b text-left text-dark-gray">
                                        <th class="pb-3 font-medium">Order #</th>
                                        <th class="pb-3 font-medium">Date</th>
                                        <th class="pb-3 font-medium">Status</th>
                                        <th class="pb-3 font-medium">Total</th>
                                        <th class="pb-3 font-medium"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentOrders as $order)
                                        <tr class="border-b last:border-0">
                                            <td class="py-3 font-medium">{{ $order->order_number }}</td>
                                            <td class="py-3">{{ $order->created_at->format('d M Y') }}</td>
                                            <td class="py-3">
                                                <span class="inline-block px-2 py-1 text-xs rounded-full
                                                    {{ $order->status === 'delivered' ? 'bg-green-100 text-green-700' : '' }}
                                                    {{ $order->status === 'pending' ? 'bg-yellow-100 text-yellow-700' : '' }}
                                                    {{ $order->status === 'processing' ? 'bg-blue-100 text-blue-700' : '' }}
                                                    {{ $order->status === 'shipped' ? 'bg-purple-100 text-purple-700' : '' }}
                                                    {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td class="py-3 font-medium">₹{{ number_format($order->grand_total, 2) }}</td>
                                            <td class="py-3">
                                                <a href="{{ route('account.order.detail', $order->order_number) }}" class="text-primary hover:underline text-sm">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-dark-gray">You haven't placed any orders yet.</p>
                        <a href="{{ route('shop.index') }}" class="btn-primary inline-block mt-4">Start Shopping</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
