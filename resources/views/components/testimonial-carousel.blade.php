{{-- Customer testimonial carousel --}}
@props(['testimonials' => null])

@php
    $testimonialData = [];
    if ($testimonials && count($testimonials)) {
        foreach ($testimonials as $t) {
            $testimonialData[] = [
                'image' => $t->image ? asset('images/' . $t->image) : null,
                'name' => $t->customer_name,
                'initial' => strtoupper(substr($t->customer_name, 0, 1)),
                'text' => $t->content,
                'rating' => $t->rating,
            ];
        }
    } else {
        $testimonialData = [
            ['image' => null, 'name' => 'Arun Sharma', 'initial' => 'A', 'text' => 'The quality of their products is simply awesome.', 'rating' => 5],
            ['image' => null, 'name' => 'Dr. Drishti Sharma', 'initial' => 'D', 'text' => 'All the items they have are hand-picked and assorted.', 'rating' => 5],
            ['image' => null, 'name' => 'Simran Malhotra', 'initial' => 'S', 'text' => 'Amazing for the price I paid. Great stuff, especially to be gifted to someone.', 'rating' => 5],
        ];
    }
@endphp

<section x-data="{
    current: 0,
    testimonials: {{ Js::from($testimonialData) }},
    interval: null,
    start() { this.interval = setInterval(() => this.next(), 6000); },
    next() { this.current = (this.current + 1) % this.testimonials.length; },
    prev() { this.current = (this.current - 1 + this.testimonials.length) % this.testimonials.length; }
}" x-init="start()" class="relative">

    {{-- Fixed-height container to prevent page jerk --}}
    <div class="relative min-h-[250px] sm:min-h-[220px]">
        <template x-for="(t, index) in testimonials" :key="index">
            <div x-show="current === index"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="absolute inset-0 text-center px-4 flex flex-col items-center justify-center">

                {{-- Avatar: image or initial --}}
                <img x-show="t.image" :src="t.image" :alt="t.name" class="w-16 h-16 rounded-full object-cover mb-4 border-4 border-primary/20">
                <div x-show="!t.image" class="w-16 h-16 rounded-full bg-primary/10 border-4 border-primary/20 flex items-center justify-center mb-4">
                    <span class="text-2xl font-heading font-bold text-primary" x-text="t.initial"></span>
                </div>

                {{-- Stars --}}
                <div class="flex justify-center gap-1 mb-3">
                    <template x-for="i in t.rating" :key="'star-' + index + '-' + i">
                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </template>
                </div>

                {{-- Quote --}}
                <p class="font-body text-text-dark italic text-lg max-w-2xl mx-auto mb-4" x-text="'&quot;' + t.text + '&quot;'"></p>
                <p class="font-ui font-semibold text-primary" x-text="t.name"></p>
            </div>
        </template>
    </div>

    {{-- Dots --}}
    <div class="flex justify-center gap-3 mt-4">
        <template x-for="(t, index) in testimonials" :key="'tdot-' + index">
            <button @click="current = index; clearInterval(interval); start()"
                    class="w-2.5 h-2.5 rounded-full transition-all duration-300 cursor-pointer"
                    :class="current === index ? 'bg-primary scale-125' : 'bg-gray-300 hover:bg-gray-400'">
            </button>
        </template>
    </div>
</section>
