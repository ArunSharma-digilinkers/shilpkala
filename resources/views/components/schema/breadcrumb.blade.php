@props(['items'])

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "BreadcrumbList",
    "itemListElement": [
        {
            "@@type": "ListItem",
            "position": 1,
            "name": "Home",
            "item": "{{ url('/') }}"
        }
        @foreach ($items as $index => $item)
        ,{
            "@@type": "ListItem",
            "position": {{ $index + 2 }},
            "name": "{{ $item['label'] }}"
            @if (isset($item['url']))
            ,"item": "{{ $item['url'] }}"
            @endif
        }
        @endforeach
    ]
}
</script>
