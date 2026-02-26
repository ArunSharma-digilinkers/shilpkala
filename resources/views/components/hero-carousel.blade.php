{{-- Hero Carousel with Alpine.js fade transitions --}}
@props(['sliders' => null])

@php
    $slideData = [];
    if ($sliders && count($sliders)) {
        foreach ($sliders as $s) {
            $slideData[] = [
                'image' => asset('images/' . $s->image),
                'title' => $s->title,
                'subtitle' => $s->subtitle,
                'cta_text' => $s->cta_text ?? 'Shop Now',
                'cta_link' => $s->cta_link ?? '/shop',
            ];
        }
    } else {
        $slideData = [
            ['image' => asset('images/hero/hero-1.jpg'), 'title' => 'Authentic Indian Handicraft', 'subtitle' => 'Handcrafted with love and tradition', 'cta_text' => 'Shop Now', 'cta_link' => '/shop'],
            ['image' => asset('images/hero/hero-2.jpg'), 'title' => 'Crafted with Love', 'subtitle' => 'Each piece tells a story of heritage', 'cta_text' => 'Explore', 'cta_link' => '/shop'],
            ['image' => asset('images/hero/hero-3.jpg'), 'title' => 'Bring on the Festivities', 'subtitle' => 'Perfect for gifting and home decor', 'cta_text' => 'Discover', 'cta_link' => '/shop'],
        ];
    }
@endphp

<section x-data="{
    current: 0,
    slides: {{ Js::from($slideData) }},
    interval: null,
    start() { this.interval = setInterval(() => this.next(), 6000); },
    next() { this.current = (this.current + 1) % this.slides.length; },
    prev() { this.current = (this.current - 1 + this.slides.length) % this.slides.length; },
    goto(index) { this.current = index; clearInterval(this.interval); this.start(); }
}" x-init="start()" class="relative h-[70vh] md:h-[85vh] overflow-hidden">

    {{-- Slides --}}
    <template x-for="(slide, index) in slides" :key="index">
        <div class="hero-slide"
             :class="current === index ? 'opacity-100 z-10' : 'opacity-0 z-0'">
            <div class="absolute inset-0 bg-cover bg-center" :style="'background-image: url(' + slide.image + ')'">
                <div class="absolute inset-0 bg-black/40"></div>
            </div>
            <div class="relative z-10 flex items-center justify-center h-full text-center px-4">
                <div>
                    <p class="font-heading text-lg md:text-xl text-white/90 tracking-widest uppercase mb-2">shilpkala</p>
                    <h1 class="font-heading text-3xl md:text-5xl lg:text-6xl text-white font-bold mb-4 leading-tight" x-text="slide.title"></h1>
                    <p class="font-body text-lg md:text-xl text-white/80 mb-8" x-text="slide.subtitle"></p>
                    <a :href="slide.cta_link" class="btn-primary text-lg px-8 py-4" x-text="slide.cta_text"></a>
                </div>
            </div>
        </div>
    </template>

    {{-- Navigation Arrows --}}
    <button @click="prev(); clearInterval(interval); start()"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white rounded-full p-3 transition-colors cursor-pointer">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>
    <button @click="next(); clearInterval(interval); start()"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white rounded-full p-3 transition-colors cursor-pointer">
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-20 flex gap-3">
        <template x-for="(slide, index) in slides" :key="'dot-' + index">
            <button @click="goto(index)"
                    class="w-3 h-3 rounded-full transition-all duration-300 cursor-pointer"
                    :class="current === index ? 'bg-primary scale-125' : 'bg-white/50 hover:bg-white/80'">
            </button>
        </template>
    </div>
</section>
