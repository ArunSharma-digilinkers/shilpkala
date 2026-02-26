@extends('layouts.app')

@section('title', 'Checkout - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Home', 'url' => url('/')], ['label' => 'Cart', 'url' => route('cart.index')], ['label' => 'Checkout']]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="font-heading text-3xl font-bold text-text-dark mb-8">Checkout</h1>

        <form id="checkout-form" action="{{ route('checkout.store') }}" method="POST" x-data="checkoutForm()">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Billing & Shipping --}}
                <div class="lg:col-span-2 space-y-6">
                    {{-- Billing --}}
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <h2 class="font-heading text-xl font-bold text-text-dark mb-4">Billing Details</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">Full Name *</label>
                                <input type="text" name="billing_name" value="{{ old('billing_name', auth()->user()?->name) }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">Email *</label>
                                <input type="email" name="billing_email" value="{{ old('billing_email', auth()->user()?->email) }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">Phone *</label>
                                <input type="tel" name="billing_phone" value="{{ old('billing_phone', auth()->user()?->phone) }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-text-dark mb-1">Address Line 1 *</label>
                                <input type="text" name="billing_address_line_1" value="{{ old('billing_address_line_1') }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_address_line_1')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-text-dark mb-1">Address Line 2</label>
                                <input type="text" name="billing_address_line_2" value="{{ old('billing_address_line_2') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">City *</label>
                                <input type="text" name="billing_city" value="{{ old('billing_city') }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_city')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">State *</label>
                                <input type="text" name="billing_state" value="{{ old('billing_state') }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_state')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">PIN Code *</label>
                                <input type="text" name="billing_pincode" value="{{ old('billing_pincode') }}" required
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                                @error('billing_pincode')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                            </div>
                        </div>
                    </div>

                    {{-- Shipping --}}
                    <div class="bg-white rounded-lg shadow-sm p-6" x-data="{ sameAsBilling: true }">
                        <h2 class="font-heading text-xl font-bold text-text-dark mb-4">Shipping Details</h2>
                        <label class="flex items-center gap-2 mb-4 cursor-pointer">
                            <input type="checkbox" name="shipping_same" value="1" x-model="sameAsBilling" checked
                                   class="rounded border-gray-300 text-primary focus:ring-primary">
                            <span class="text-sm text-text-dark">Same as billing address</span>
                        </label>

                        <div x-show="!sameAsBilling" x-cloak class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">Full Name *</label>
                                <input type="text" name="shipping_name" value="{{ old('shipping_name') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">Phone</label>
                                <input type="tel" name="shipping_phone" value="{{ old('shipping_phone') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-text-dark mb-1">Address Line 1 *</label>
                                <input type="text" name="shipping_address_line_1" value="{{ old('shipping_address_line_1') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block text-sm font-medium text-text-dark mb-1">Address Line 2</label>
                                <input type="text" name="shipping_address_line_2" value="{{ old('shipping_address_line_2') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">City *</label>
                                <input type="text" name="shipping_city" value="{{ old('shipping_city') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">State *</label>
                                <input type="text" name="shipping_state" value="{{ old('shipping_state') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-text-dark mb-1">PIN Code *</label>
                                <input type="text" name="shipping_pincode" value="{{ old('shipping_pincode') }}"
                                       class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none">
                            </div>
                        </div>
                    </div>

                    {{-- Notes --}}
                    <div class="bg-white rounded-lg shadow-sm p-6">
                        <label class="block text-sm font-medium text-text-dark mb-1">Order Notes (optional)</label>
                        <textarea name="notes" rows="3" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-primary/30 focus:border-primary focus:outline-none"
                                  placeholder="Notes about your order...">{{ old('notes') }}</textarea>
                    </div>
                </div>

                {{-- Order Summary --}}
                <div class="bg-white rounded-lg shadow-sm p-6 h-fit sticky top-24">
                    <h2 class="font-heading text-xl font-bold text-text-dark mb-4">Your Order</h2>
                    <div class="space-y-3 border-b border-gray-100 pb-4 mb-4">
                        @foreach($items as $item)
                        <div class="flex justify-between text-sm">
                            <span class="text-text-dark">{{ $item['name'] }} x {{ $item['quantity'] }}</span>
                            <span class="font-medium">&#8377;{{ number_format($item['price'] * $item['quantity']) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between"><span class="text-light-gray">Subtotal</span><span>&#8377;{{ number_format($subtotal) }}</span></div>
                        @if($discount > 0)
                        <div class="flex justify-between"><span class="text-green-600">Discount</span><span class="text-green-600">-&#8377;{{ number_format($discount) }}</span></div>
                        @endif
                        <div class="flex justify-between"><span class="text-light-gray">Shipping</span><span>{{ $shipping > 0 ? '₹' . number_format($shipping) : 'Free' }}</span></div>
                        <div class="flex justify-between border-t border-gray-100 pt-3 text-lg font-bold">
                            <span>Total</span><span class="text-primary">&#8377;{{ number_format($total) }}</span>
                        </div>
                    </div>

                    {{-- Payment Method --}}
                    <div class="mt-6 space-y-2">
                        <h3 class="text-sm font-medium text-text-dark mb-2">Payment Method</h3>
                        <label class="flex items-center gap-2 p-3 bg-bg-light rounded-md cursor-pointer border-2 transition"
                               :class="paymentMethod === 'cod' ? 'border-primary' : 'border-transparent'">
                            <input type="radio" name="payment_method" value="cod" x-model="paymentMethod"
                                   class="text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-text-dark">Cash on Delivery</span>
                        </label>
                        <label class="flex items-center gap-2 p-3 bg-bg-light rounded-md cursor-pointer border-2 transition"
                               :class="paymentMethod === 'razorpay' ? 'border-primary' : 'border-transparent'">
                            <input type="radio" name="payment_method" value="razorpay" x-model="paymentMethod"
                                   class="text-primary focus:ring-primary">
                            <span class="text-sm font-medium text-text-dark">Pay Online (UPI / Card / Net Banking)</span>
                        </label>
                    </div>

                    {{-- COD Button --}}
                    <button type="submit" x-show="paymentMethod === 'cod'" class="btn-primary w-full text-center mt-6 block">
                        Place Order (COD)
                    </button>

                    {{-- Razorpay Button --}}
                    <button type="button" x-show="paymentMethod === 'razorpay'" @click="payWithRazorpay()"
                            class="btn-primary w-full text-center mt-6 block" :disabled="processing">
                        <span x-show="!processing">Pay &#8377;{{ number_format($total) }}</span>
                        <span x-show="processing">Processing...</span>
                    </button>

                    <p x-show="errorMsg" x-text="errorMsg" class="text-red-500 text-sm mt-2 text-center"></p>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
function checkoutForm() {
    return {
        paymentMethod: 'cod',
        processing: false,
        errorMsg: '',

        async payWithRazorpay() {
            this.processing = true;
            this.errorMsg = '';

            const form = document.getElementById('checkout-form');
            const formData = new FormData(form);

            try {
                const response = await fetch('{{ route("payment.create") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: formData,
                });

                const data = await response.json();

                if (!response.ok) {
                    this.errorMsg = data.message || 'Failed to create order. Please check your details.';
                    this.processing = false;
                    return;
                }

                const options = {
                    key: data.key,
                    amount: data.amount,
                    currency: data.currency,
                    name: 'Shilpkala',
                    description: 'Handcrafted Products',
                    order_id: data.order_id,
                    handler: async (response) => {
                        const verifyResponse = await fetch('{{ route("payment.verify") }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                'Accept': 'application/json',
                            },
                            body: JSON.stringify({
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_signature: response.razorpay_signature,
                            }),
                        });

                        const verifyData = await verifyResponse.json();

                        if (verifyData.success) {
                            window.location.href = verifyData.redirect;
                        } else {
                            this.errorMsg = 'Payment verification failed. Please contact support.';
                            this.processing = false;
                        }
                    },
                    prefill: {
                        name: formData.get('billing_name'),
                        email: formData.get('billing_email'),
                        contact: formData.get('billing_phone'),
                    },
                    theme: {
                        color: '#FC5A6D',
                    },
                    modal: {
                        ondismiss: () => {
                            this.processing = false;
                        }
                    }
                };

                const rzp = new Razorpay(options);
                rzp.open();
            } catch (error) {
                this.errorMsg = 'Something went wrong. Please try again.';
                this.processing = false;
            }
        }
    };
}
</script>
@endpush
@endsection
