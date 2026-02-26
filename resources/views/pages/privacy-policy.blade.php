@extends('layouts.app')
@section('title', 'Privacy Policy - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'Privacy Policy']]" />

    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">Privacy Policy</h1>

        <div class="bg-white rounded-lg shadow-sm p-8">
            @if ($page && $page->content)
                <div class="prose prose-lg max-w-none text-dark-gray">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-6 text-dark-gray leading-relaxed text-sm">
                    <p><strong>Last updated:</strong> {{ date('F Y') }}</p>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Information We Collect</h2>
                        <p>We collect personal information that you provide when creating an account, placing an order, or contacting us. This includes your name, email address, phone number, shipping address, and payment information.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">How We Use Your Information</h2>
                        <ul class="list-disc pl-6 space-y-1">
                            <li>To process and fulfill your orders</li>
                            <li>To communicate order updates and shipping notifications</li>
                            <li>To respond to your inquiries and customer support requests</li>
                            <li>To improve our website and services</li>
                            <li>To send promotional communications (with your consent)</li>
                        </ul>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Information Security</h2>
                        <p>We implement appropriate security measures to protect your personal information. Payment processing is handled by secure, PCI-compliant third-party payment processors.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Cookies</h2>
                        <p>Our website uses cookies to enhance your browsing experience, maintain your shopping cart, and analyze site traffic. You can disable cookies in your browser settings.</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Third-Party Sharing</h2>
                        <p>We do not sell or share your personal information with third parties, except as necessary to fulfill orders (shipping partners) or process payments (payment gateways).</p>
                    </section>

                    <section>
                        <h2 class="text-xl font-heading font-semibold text-text-dark mb-2">Contact Us</h2>
                        <p>For questions about this privacy policy, contact us at <a href="mailto:info@shilpkalaworld.com" class="text-primary hover:underline">info@shilpkalaworld.com</a>.</p>
                    </section>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
