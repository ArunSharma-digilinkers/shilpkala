@extends('layouts.app')
@section('title', 'Terms of Service - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Terms of Service']]" />

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">Terms of Service</h1>

        <div class="bg-white rounded-lg shadow-sm p-8">
            @if ($page && $page->content)
                <div class="prose prose-lg max-w-none text-dark-gray">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-6 text-dark-gray leading-relaxed text-sm">
                    <p><strong>Last updated:</strong> {{ date('F Y') }}</p>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Acceptance of Terms</h2>
                        <p>By accessing and using shilpkalaworld.com, you agree to be bound by these terms and conditions. If you do not agree with any part of these terms, please do not use our website.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Products</h2>
                        <p>All products sold on Shilpkala are handcrafted. Due to the nature of handmade items, slight variations in color, size, shape, and texture are expected and add to the uniqueness of each piece. Product images are for illustration purposes; actual products may vary slightly.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Pricing</h2>
                        <p>All prices are listed in Indian Rupees (INR) and include applicable taxes. We reserve the right to modify prices without prior notice. The price at the time of order placement will be honored.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Orders</h2>
                        <p>Placing an order constitutes an offer to purchase. We reserve the right to accept or decline any order. Orders are subject to product availability. You will receive an email confirmation once your order is accepted.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">User Accounts</h2>
                        <p>You are responsible for maintaining the confidentiality of your account credentials. You agree to notify us immediately of any unauthorized use of your account.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Intellectual Property</h2>
                        <p>All content on this website, including images, text, logos, and designs, is the property of Shilpkala and is protected by copyright laws. Unauthorized use or reproduction is prohibited.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Limitation of Liability</h2>
                        <p>Shilpkala shall not be liable for any indirect, incidental, or consequential damages arising from the use of our website or products, to the extent permitted by law.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Governing Law</h2>
                        <p>These terms are governed by the laws of India. Any disputes shall be subject to the exclusive jurisdiction of the courts in Pune, Maharashtra.</p>
                    </section>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
