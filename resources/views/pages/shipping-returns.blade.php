@extends('layouts.app')
@section('title', 'Shipping & Returns - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Shipping & Returns']]" />

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">Shipping & Returns</h1>

        <div class="bg-white rounded-lg shadow-sm p-8">
            @if ($page && $page->content)
                <div class="prose prose-lg max-w-none text-dark-gray">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-8 text-dark-gray leading-relaxed">
                    <section>
                        <h2 class="text-2xl font-heading font-semibold text-text-dark mb-3">Shipping Policy</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>We ship across India via trusted courier partners.</li>
                            <li>Standard delivery takes <strong>5-7 business days</strong>.</li>
                            <li>Free shipping on orders above <strong>₹999</strong>.</li>
                            <li>Flat ₹50 shipping charge for orders below ₹999.</li>
                            <li>You will receive an email with tracking details once your order is shipped.</li>
                            <li>Handcrafted items may require 2-3 additional days for preparation.</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-heading font-semibold text-text-dark mb-3">Return Policy</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Returns are accepted within <strong>7 days</strong> of delivery.</li>
                            <li>Items must be in original packaging and unused condition.</li>
                            <li>Damaged or defective products will be replaced free of charge.</li>
                            <li>Minor variations in handcrafted products (color, size, texture) are natural and not considered defects.</li>
                            <li>To initiate a return, contact us at <a href="mailto:info@shilpkalaworld.com" class="text-primary hover:underline">info@shilpkalaworld.com</a> with your order number and photos.</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-2xl font-heading font-semibold text-text-dark mb-3">Refund Policy</h2>
                        <ul class="list-disc pl-6 space-y-2">
                            <li>Refunds are processed within <strong>5-7 business days</strong> after receiving the returned item.</li>
                            <li>Refunds are issued to the original payment method.</li>
                            <li>Shipping charges are non-refundable unless the item was damaged or defective.</li>
                        </ul>
                    </section>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
