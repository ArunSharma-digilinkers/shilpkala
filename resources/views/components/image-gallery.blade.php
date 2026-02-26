{{-- Product image gallery with Alpine.js --}}
@props(['images', 'alt' => ''])

@php
    $imageList = $images->map(fn($img) => ['url' => $img->url, 'alt' => $img->alt_text ?? $alt])->values()->toArray();
    if (empty($imageList)) {
        $imageList = [['url' => asset('images/site/shilpkala.jpg'), 'alt' => $alt]];
    }
@endphp

<div x-data="{ current: 0, images: {{ Js::from($imageList) }} }">
    {{-- Main Image --}}
    <div class="aspect-square product-img-bg rounded-lg overflow-hidden shadow-sm mb-4">
        <img :src="images[current].url" :alt="images[current].alt"
             class="w-full h-full object-contain p-4" />
    </div>

    {{-- Thumbnails --}}
    @if(count($imageList) > 1)
    <div class="grid grid-cols-5 gap-2">
        <template x-for="(img, index) in images" :key="index">
            <button @click="current = index"
                    class="aspect-square rounded-md overflow-hidden border-2 transition-colors cursor-pointer product-img-bg"
                    :class="current === index ? 'border-primary' : 'border-gray-200 hover:border-gray-300'">
                <img :src="img.url" :alt="img.alt" class="w-full h-full object-contain p-1">
            </button>
        </template>
    </div>
    @endif
</div>
