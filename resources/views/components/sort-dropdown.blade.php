<div x-data="{ open: false }" class="relative">
    <button @click="open = !open" class="flex items-center gap-2 px-3 py-2 border border-gray-200 rounded-lg text-sm font-ui text-text-dark hover:border-primary transition-colors cursor-pointer">
        <span>
            @switch(request('sort'))
                @case('price_low') Price: Low to High @break
                @case('price_high') Price: High to Low @break
                @case('name') Name @break
                @default Latest
            @endswitch
        </span>
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
    </button>
    <div x-show="open" @click.outside="open = false" x-cloak x-transition
         class="absolute right-0 mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-100 py-1 z-20">
        @foreach(['latest' => 'Latest', 'price_low' => 'Price: Low to High', 'price_high' => 'Price: High to Low', 'name' => 'Name'] as $value => $label)
            <a href="{{ request()->fullUrlWithQuery(['sort' => $value]) }}"
               class="block px-4 py-2 text-sm hover:bg-primary/5 hover:text-primary transition-colors {{ request('sort', 'latest') === $value ? 'text-primary font-semibold' : 'text-text-dark' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>
</div>
