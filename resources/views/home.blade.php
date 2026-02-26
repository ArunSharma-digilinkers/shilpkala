@extends('layouts.app')

@section('title', 'Shilpkala - Authentic Indian Handicraft')
@section('hero-navbar', true)

@section('content')

<x-schema.organization />

{{-- Section 1: Hero Carousel --}}
<x-hero-carousel :sliders="$sliders ?? null" />

{{-- Section 2: Welcome Section --}}
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('images/site/craft1.jpg') }}" alt="Shilpkala Handicraft" class="w-full h-[250px] md:h-[400px] object-cover">
            </div>
            <div>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-text-dark mb-6">
                    Welcome To <span class="text-primary">Shilpkala</span>
                </h2>
                <p class="text-light-gray leading-relaxed mb-6">
                    India is the land of festivals. The traditions we follow every single year, when families come together and the legacies we leave behind. Generations after generations, we pass them down with love and care. This love and care is what we aspire to radiate through our products.
                </p>
                <p class="text-light-gray leading-relaxed mb-8">
                    Handmade products each made with special care and precision, are perfect for your family this festival season, be it for gifting or your own home. Each product is uniquely individual and hand crafted by the artists who work with utmost devotion, care and passion.
                </p>
                <a href="{{ url('/about') }}" class="btn-primary">Know More</a>
            </div>
        </div>
    </div>
</section>

{{-- Section 3: New Arrivals (Product Grid) --}}
<section class="section-padding bg-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-text-dark mb-3">Our New Arrivals</h2>
            <p class="text-light-gray max-w-2xl mx-auto">Discover our latest handcrafted treasures, each made with love and traditional techniques.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($featuredProducts ?? [] as $product)
                <x-product-card
                    :name="$product->name"
                    :image="$product->primary_image_url"
                    :price="$product->price"
                    :sale-price="$product->sale_price"
                    :description="$product->short_description ?? ''"
                    :slug="$product->slug"
                />
            @empty
                <p class="col-span-3 text-center text-light-gray">Products coming soon!</p>
            @endforelse
        </div>

        <div class="text-center mt-10">
            <a href="{{ url('/shop') }}" class="btn-outline">View All Products</a>
        </div>
    </div>
</section>

{{-- Section 4: Why Choose Us (Accordion) --}}
<section class="section-padding bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-text-dark mb-8">
                    Why Choose <span class="text-primary">Us</span>
                </h2>
                <div class="border-t border-gray-200">
                    <x-accordion-item title="Hand Picked Items" :open="true">
                        At Shilpkala we strive to bring to you most exclusive pieces that are best of Indian crafts. Our items are made with the perspective of a common man. Every item is hand picked from diverse cultures by our experts.
                    </x-accordion-item>
                    <x-accordion-item title="Work With Passion">
                        We work with passion and uniquely create each and every single item with love and care. Our products are fabricated, keeping in mind the Indian traditions and art forms.
                    </x-accordion-item>
                    <x-accordion-item title="High Quality">
                        We aim to bring you products of the finest quality handcrafted by the seasoned professionals. Every item we create appeals to all personal preferences.
                    </x-accordion-item>
                </div>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('images/site/choose.jpg') }}" alt="Why Choose Shilpkala" class="w-full h-[250px] md:h-[400px] object-cover">
            </div>
        </div>
    </div>
</section>

{{-- Section 5: Customer Testimonials --}}
<section class="section-padding bg-bg-light">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-text-dark mb-3">What Our Customers Say</h2>
            <p class="text-light-gray">Real stories from happy customers who love our handicrafts.</p>
        </div>
        <x-testimonial-carousel :testimonials="$testimonials ?? null" />
    </div>
</section>

@endsection
