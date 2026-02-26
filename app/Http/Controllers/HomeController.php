<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class HomeController extends Controller
{
    public function index()
    {
        SEOMeta::setTitle('Shilpkala - Authentic Indian Handicraft');
        SEOMeta::setDescription('Discover handcrafted Indian handicraft products. Terracotta Ganpati idols, decorative diyas, painted vases, traditional paintings and more by skilled artisans.');
        OpenGraph::setTitle('Shilpkala - Authentic Indian Handicraft');
        OpenGraph::setUrl(url('/'));
        JsonLd::setTitle('Shilpkala - Authentic Indian Handicraft');
        JsonLd::setType('WebSite');

        $sliders = Slider::active()->get();
        $featuredProducts = Product::with('images')
            ->featured()
            ->inStock()
            ->take(10)
            ->get();
        $testimonials = Testimonial::active()->get();

        return view('home', compact('sliders', 'featuredProducts', 'testimonials'));
    }
}
