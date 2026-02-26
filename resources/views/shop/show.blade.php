@extends('layouts.app')

@section('title', $product->name . ' - Shilpkala')

@section('content')
<x-schema.product :product="$product" />
<div class="pt-20">
    {{-- Breadcrumb --}}
    <x-breadcrumb :items="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Shop', 'url' => url('/shop')],
        ...($product->category ? [['label' => $product->category->name, 'url' => url('/category/' . $product->category->slug)]] : []),
        ['label' => $product->name],
    ]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- Image Gallery --}}
            <x-image-gallery :images="$product->images" :alt="$product->name" />

            {{-- Product Info --}}
            <div>
                @if($product->category)
                    <a href="{{ url('/category/' . $product->category->slug) }}" class="text-primary text-sm font-ui uppercase tracking-wider hover:underline">
                        {{ $product->category->name }}
                    </a>
                @endif

                <h1 class="font-heading text-3xl md:text-4xl font-bold text-text-dark mt-2 mb-4">{{ $product->name }}</h1>

                {{-- Price --}}
                <div class="flex items-center gap-3 mb-6">
                    @if($product->sale_price)
                        <span class="text-primary font-ui font-bold text-2xl">&#8377;{{ number_format($product->sale_price) }}</span>
                        <span class="text-light-gray line-through text-lg">&#8377;{{ number_format($product->price) }}</span>
                    @else
                        <span class="text-primary font-ui font-bold text-2xl">&#8377;{{ number_format($product->price) }}</span>
                    @endif
                </div>

                {{-- Description --}}
                <div class="text-text-dark leading-relaxed mb-6">
                    {!! nl2br(e($product->description ?? $product->short_description)) !!}
                </div>

                {{-- Specs --}}
                <div class="border-t border-gray-200 pt-4 mb-6 space-y-2 text-sm">
                    <div class="flex gap-2"><span class="font-semibold text-text-dark w-24">SKU:</span><span class="text-light-gray">{{ $product->sku }}</span></div>
                    @if($product->weight)<div class="flex gap-2"><span class="font-semibold text-text-dark w-24">Weight:</span><span class="text-light-gray">{{ $product->weight }} kg</span></div>@endif
                    @if($product->height || $product->length || $product->width)
                        <div class="flex gap-2">
                            <span class="font-semibold text-text-dark w-24">Dimensions:</span>
                            <span class="text-light-gray">
                                {{ $product->height ? $product->height . ' cm' : '-' }} x
                                {{ $product->length ? $product->length . ' cm' : '-' }} x
                                {{ $product->width ? $product->width . ' cm' : '-' }}
                            </span>
                        </div>
                    @endif
                    <div class="flex gap-2">
                        <span class="font-semibold text-text-dark w-24">Availability:</span>
                        <span class="{{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $product->stock > 0 ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </div>
                </div>

                {{-- Add to Cart --}}
                @if($product->stock > 0)
                <form action="{{ url('/cart/add') }}" method="POST" class="flex items-center gap-4 mb-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="flex items-center border border-gray-300 rounded-md">
                        <button type="button" onclick="this.nextElementSibling.stepDown(); this.nextElementSibling.dispatchEvent(new Event('change'))"
                                class="px-3 py-2 text-gray-500 hover:text-primary cursor-pointer">-</button>
                        <input type="number" name="quantity" value="1" min="1" max="{{ $product->stock }}" class="w-14 text-center border-x border-gray-300 py-2 focus:outline-none">
                        <button type="button" onclick="this.previousElementSibling.stepUp(); this.previousElementSibling.dispatchEvent(new Event('change'))"
                                class="px-3 py-2 text-gray-500 hover:text-primary cursor-pointer">+</button>
                    </div>
                    <button type="submit" class="btn-primary flex items-center gap-2">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/></svg>
                        Add to Cart
                    </button>
                </form>
                @endif
            </div>
        </div>

        {{-- Related Products --}}
        @if($relatedProducts->count())
        <section class="mt-16">
            <h2 class="font-heading text-2xl font-bold text-text-dark mb-6">You May Also Like</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
                    <x-product-card
                        :name="$related->name"
                        :image="$related->primary_image_url"
                        :price="$related->price"
                        :sale-price="$related->sale_price"
                        :description="$related->short_description ?? ''"
                        :slug="$related->slug"
                    />
                @endforeach
            </div>
        </section>
        @endif
    </div>
</div>
@endsection
