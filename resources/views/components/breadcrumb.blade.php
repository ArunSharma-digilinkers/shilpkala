@props(['items' => []])

<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3">
        <ol class="flex items-center gap-2 text-sm font-ui">
            @foreach($items as $i => $item)
                @if($i > 0)
                    <li class="text-light-gray">/</li>
                @endif
                @if(isset($item['url']) && $item['url'])
                    <li><a href="{{ $item['url'] }}" class="text-light-gray hover:text-primary transition-colors">{{ $item['label'] }}</a></li>
                @else
                    <li class="text-text-dark font-medium">{{ $item['label'] }}</li>
                @endif
            @endforeach
        </ol>
    </div>
</nav>
