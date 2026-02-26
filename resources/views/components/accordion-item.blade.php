{{-- Alpine.js collapsible accordion item --}}
@props(['title', 'open' => false])

<div x-data="{ expanded: {{ $open ? 'true' : 'false' }} }" class="border-b border-gray-200">
    <button @click="expanded = !expanded"
            class="w-full flex items-center justify-between py-4 px-2 text-left cursor-pointer group">
        <h3 class="font-heading text-lg font-semibold text-text-dark group-hover:text-primary transition-colors">{{ $title }}</h3>
        <svg class="h-5 w-5 text-primary transition-transform duration-300" :class="expanded && 'rotate-180'" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="expanded" x-collapse>
        <div class="px-2 pb-4 text-light-gray leading-relaxed">
            {{ $slot }}
        </div>
    </div>
</div>
