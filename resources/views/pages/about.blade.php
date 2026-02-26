@extends('layouts.app')
@section('title', 'About Us - Shilpkala')

@section('content')
<div class="pt-20">
    <x-breadcrumb :items="[['label' => 'About Us']]" />

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl md:text-4xl font-heading font-bold text-text-dark mb-8 text-center">About Shilpkala</h1>

        <div class="bg-white rounded-lg shadow-sm p-8">
            @if ($page && $page->content)
                <div class="prose prose-lg max-w-none text-dark-gray">
                    {!! $page->content !!}
                </div>
            @else
                <div class="space-y-6 text-dark-gray leading-relaxed">
                    <div class="text-center mb-8">
                        <img src="{{ asset('images/site/craft3.jpg') }}" alt="Vibrant Handcrafted Indian Pottery - Shilpkala" class="rounded-lg mx-auto max-w-md w-full">
                    </div>

                    <p>
                        <strong class="text-text-dark">Shilpkala</strong> is a celebration of India's rich handcraft tradition. We bring you authentic,
                        handcrafted products made by skilled artisans from across the country, preserving centuries-old techniques
                        and cultural heritage.
                    </p>

                    <p>
                        From the sacred terracotta Ganpati idols of Maharashtra to the vibrant Rajasthani paintings,
                        every piece in our collection tells a story of dedication, skill, and artistry. Our artisans pour their
                        hearts into creating these masterpieces, ensuring each item is unique and of the highest quality.
                    </p>

                    <h2 class="text-2xl font-heading font-semibold text-text-dark mt-8">Our Mission</h2>
                    <p>
                        We are committed to empowering rural artisans by providing them a platform to showcase their
                        craftsmanship to a wider audience. By choosing Shilpkala, you directly support the livelihoods of
                        these talented craftspeople and help keep traditional Indian art forms alive.
                    </p>

                    <h2 class="text-2xl font-heading font-semibold text-text-dark mt-8">Why Choose Us?</h2>
                    <ul class="list-disc pl-6 space-y-2">
                        <li>100% authentic handcrafted products</li>
                        <li>Directly sourced from skilled artisans</li>
                        <li>Supporting rural livelihoods and traditional crafts</li>
                        <li>Eco-friendly and sustainable materials</li>
                        <li>Carefully packaged and shipped across India</li>
                    </ul>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
