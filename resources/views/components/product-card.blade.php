{{-- Reusable product card --}}
@props(['name', 'image', 'price', 'description' => '', 'slug' => '#', 'salePrice' => null])

<div class="product-card bg-white rounded-lg shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden group">
    {{-- Image --}}
    <a href="{{ $slug !== '#' ? url('/shop/' . $slug) : '#' }}" class="block overflow-hidden aspect-square product-img-bg">
        <img src="{{ $image }}" alt="{{ $name }}" class="product-image w-full h-full object-contain p-2" loading="lazy">
    </a>

    {{-- Content --}}
    <div class="p-4">
        <h3 class="font-heading text-lg font-semibold text-text-dark mb-1 truncate">
            <a href="{{ $slug !== '#' ? url('/shop/' . $slug) : '#' }}" class="hover:text-primary transition-colors">{{ $name }}</a>
        </h3>

        @if($description)
            <p class="text-light-gray text-sm mb-3 line-clamp-2">{{ $description }}</p>
        @endif

        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                @if($salePrice)
                    <span class="text-primary font-ui font-bold text-lg">&#8377;{{ number_format($salePrice) }}</span>
                    <span class="text-light-gray line-through text-sm">&#8377;{{ number_format($price) }}</span>
                @else
                    <span class="text-primary font-ui font-bold text-lg">&#8377;{{ number_format($price) }}</span>
                @endif
            </div>
            <a href="{{ $slug !== '#' ? url('/shop/' . $slug) : '#' }}" class="text-primary font-ui text-sm font-semibold hover:underline">
                Know More
            </a>
        </div>
    </div>
</div>
