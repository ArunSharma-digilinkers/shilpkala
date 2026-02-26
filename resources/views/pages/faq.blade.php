@extends('layouts.app')
@section('title', 'FAQ - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'FAQ']]" />

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">Frequently Asked Questions</h1>

        <div class="bg-white rounded-lg shadow-sm p-6">
            @if ($page && $page->content)
                <div class="prose prose-lg max-w-none text-dark-gray">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-2">
                    <x-accordion-item title="Are your products genuinely handmade?">
                        Yes! Every product on Shilpkala is 100% handcrafted by skilled artisans from across India. Each piece is unique and may have slight variations, which is a hallmark of authentic handcraft.
                    </x-accordion-item>

                    <x-accordion-item title="How long does delivery take?">
                        Standard delivery takes 5-7 business days across India. Since our products are handcrafted, some items may require 2-3 additional days for preparation. You'll receive tracking details via email once your order ships.
                    </x-accordion-item>

                    <x-accordion-item title="Do you ship internationally?">
                        Currently, we only ship within India. We're working on expanding our delivery network to serve international customers soon.
                    </x-accordion-item>

                    <x-accordion-item title="What payment methods do you accept?">
                        We accept Cash on Delivery (COD) and all major online payment methods through Razorpay including UPI, credit/debit cards, net banking, and wallets.
                    </x-accordion-item>

                    <x-accordion-item title="What is your return policy?">
                        We accept returns within 7 days of delivery for damaged or defective items. Since these are handcrafted products, minor variations in color, size, and design are expected and not considered defects. Please contact us with photos for a quick resolution.
                    </x-accordion-item>

                    <x-accordion-item title="How do I care for terracotta products?">
                        Terracotta products should be kept away from direct sunlight and excessive moisture. Clean with a dry or slightly damp cloth. Avoid using chemical cleaners. Handle with care as terracotta is fragile.
                    </x-accordion-item>

                    <x-accordion-item title="Can I customize or bulk order products?">
                        Yes! We offer customization and bulk orders for festivals, corporate gifting, and events. Please contact us at info@shilpkalaworld.com with your requirements.
                    </x-accordion-item>

                    <x-accordion-item title="How are the products packaged?">
                        All products are carefully packed with multiple layers of protection using eco-friendly materials. Fragile items like terracotta idols receive extra bubble wrap and cushioning to ensure safe delivery.
                    </x-accordion-item>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
