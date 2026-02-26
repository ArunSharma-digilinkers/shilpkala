<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        $sliders = [
            [
                'title' => 'Authentic Indian Handicraft',
                'subtitle' => 'Handcrafted with love and tradition',
                'image' => 'hero/hero-1.jpg',
                'cta_text' => 'Shop Now',
                'cta_link' => '/shop',
                'sort_order' => 1,
            ],
            [
                'title' => 'Crafted with Love',
                'subtitle' => 'Each piece tells a story of heritage',
                'image' => 'hero/hero-2.jpg',
                'cta_text' => 'Explore',
                'cta_link' => '/shop',
                'sort_order' => 2,
            ],
            [
                'title' => 'Bring on the Festivities',
                'subtitle' => 'Perfect for gifting and home decor',
                'image' => 'hero/hero-3.jpg',
                'cta_text' => 'Discover',
                'cta_link' => '/shop',
                'sort_order' => 3,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }
    }
}
