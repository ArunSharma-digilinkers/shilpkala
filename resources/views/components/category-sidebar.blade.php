@props(['categories', 'current' => null])

<div class="bg-white rounded-lg shadow-sm p-5">
    <h3 class="font-heading text-lg font-bold text-text-dark mb-4">Categories</h3>
    <ul class="space-y-2">
        <li>
            <a href="{{ url('/shop') }}"
               class="flex items-center justify-between py-1.5 px-2 rounded text-sm font-ui transition-colors {{ !$current ? 'bg-primary/10 text-primary font-semibold' : 'text-text-dark hover:text-primary' }}">
                All Products
            </a>
        </li>
        @foreach($categories as $category)
        <li>
            <a href="{{ url('/category/' . $category->slug) }}"
               class="flex items-center justify-between py-1.5 px-2 rounded text-sm font-ui transition-colors {{ $current && $current->id === $category->id ? 'bg-primary/10 text-primary font-semibold' : 'text-text-dark hover:text-primary' }}">
                {{ $category->name }}
                <span class="text-xs text-light-gray">({{ $category->products_count }})</span>
            </a>
        </li>
        @endforeach
    </ul>
</div>
