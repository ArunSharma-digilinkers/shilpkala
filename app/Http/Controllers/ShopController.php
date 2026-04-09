<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        SEOMeta::setTitle('Shop Handcrafted Products');
        SEOMeta::setDescription('Browse our collection of authentic Indian handicraft products. Terracotta idols, decorative diyas, painted vases, and more.');
        OpenGraph::setTitle('Shop - Shilpkala');
        OpenGraph::setUrl(url('/shop'));

        $query = Product::with(['images', 'category'])->inStock();

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Price range
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Sort
        $sort = $request->get('sort', 'latest');
        $query = match ($sort) {
            'price_low' => $query->orderBy('price', 'asc'),
            'price_high' => $query->orderBy('price', 'desc'),
            'name' => $query->orderBy('name', 'asc'),
            default => $query->orderBy('created_at', 'desc'),
        };

        $products = $query->paginate(16)->withQueryString();
        $categories = Category::withCount('products')->orderBy('sort_order')->get();

        return view('shop.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load(['images', 'category']);

        SEOMeta::setTitle($product->name);
        SEOMeta::setDescription($product->short_description ?? substr(strip_tags($product->description ?? ''), 0, 160));
        OpenGraph::setTitle($product->name . ' - Shilpkala');
        OpenGraph::setDescription($product->short_description ?? '');
        OpenGraph::setUrl(route('shop.show', $product->slug));
        if ($product->primary_image_url) {
            OpenGraph::addImage($product->primary_image_url);
        }
        JsonLd::setTitle($product->name);
        JsonLd::setType('Product');

        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->inStock()
            ->take(4)
            ->get();

        return view('shop.show', compact('product', 'relatedProducts'));
    }
}
