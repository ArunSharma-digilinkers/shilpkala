@props(['product'])

<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Product",
    "name": "{{ $product->name }}",
    "description": "{{ $product->short_description ?? substr(strip_tags($product->description ?? ''), 0, 200) }}",
    @if($product->primary_image_url)
    "image": "{{ $product->primary_image_url }}",
    @endif
    "sku": "{{ $product->sku }}",
    "brand": {
        "@@type": "Brand",
        "name": "Shilpkala"
    },
    "offers": {
        "@@type": "Offer",
        "url": "{{ route('shop.show', $product->slug) }}",
        "priceCurrency": "INR",
        "price": "{{ $product->effective_price }}",
        "availability": "{{ $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
        "seller": {
            "@@type": "Organization",
            "name": "Shilpkala"
        }
    }
}
</script>
