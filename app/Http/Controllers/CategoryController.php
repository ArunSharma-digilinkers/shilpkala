<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        SEOMeta::setTitle($category->name . ' - Handcrafted Products');
        SEOMeta::setDescription($category->description ?? "Browse our collection of {$category->name} handcrafted products.");
        OpenGraph::setTitle($category->name . ' - Shilpkala');
        OpenGraph::setUrl(route('category.show', $category->slug));

        $products = $category->products()
            ->with('images')
            ->inStock()
            ->paginate(16);

        return view('shop.index', [
            'products' => $products,
            'categories' => Category::withCount('products')->orderBy('sort_order')->get(),
            'currentCategory' => $category,
        ]);
    }
}
