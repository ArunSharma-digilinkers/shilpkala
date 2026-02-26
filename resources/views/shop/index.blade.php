@extends('layouts.app')

@section('title', isset($currentCategory) ? $currentCategory->name . ' - Shilpkala' : 'Shop - Shilpkala')

@section('content')
<div class="pt-20">
    {{-- Breadcrumb --}}
    <x-breadcrumb :items="[
        ['label' => 'Home', 'url' => url('/')],
        ['label' => 'Shop', 'url' => isset($currentCategory) ? url('/shop') : null],
        ...( isset($currentCategory) ? [['label' => $currentCategory->name]] : [])
    ]" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            {{-- Sidebar --}}
            <aside class="lg:w-64 shrink-0">
                <x-category-sidebar :categories="$categories" :current="$currentCategory ?? null" />
            </aside>

            {{-- Main Content --}}
            <div class="flex-1">
                {{-- Top bar: Search + Sort --}}
                <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between mb-6">
                    <x-search-bar />
                    <div class="flex items-center gap-4">
                        <span class="text-light-gray text-sm">{{ $products->total() }} products</span>
                        <x-sort-dropdown />
                    </div>
                </div>

                {{-- Product Grid --}}
                @if($products->count())
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                        @foreach($products as $product)
                            <x-product-card
                                :name="$product->name"
                                :image="$product->primary_image_url"
                                :price="$product->price"
                                :sale-price="$product->sale_price"
                                :description="$product->short_description ?? ''"
                                :slug="$product->slug"
                            />
                        @endforeach
                    </div>

                    <div class="mt-8">
                        {{ $products->links() }}
                    </div>
                @else
                    <div class="text-center py-16">
                        <p class="text-light-gray text-lg">No products found.</p>
                        <a href="{{ url('/shop') }}" class="btn-primary mt-4 inline-block">View All Products</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
