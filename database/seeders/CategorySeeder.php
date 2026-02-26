<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Candles', 'slug' => 'candles', 'description' => 'Floating candles and decorative candle holders', 'sort_order' => 1],
            ['name' => 'Diyas', 'slug' => 'diyas', 'description' => 'Traditional Indian oil lamps for festivals', 'sort_order' => 2],
            ['name' => 'Envelopes', 'slug' => 'envelopes', 'description' => 'Handcrafted decorative gift envelopes', 'sort_order' => 3],
            ['name' => 'Jewellery Box', 'slug' => 'jewellery-box', 'description' => 'Decorative storage boxes in Doli style', 'sort_order' => 4],
            ['name' => 'Mirrors', 'slug' => 'mirrors', 'description' => 'Hanging decorative mirrors', 'sort_order' => 5],
            ['name' => 'Paintings', 'slug' => 'paintings', 'description' => '3D wall paintings and wall clocks', 'sort_order' => 6],
            ['name' => 'Planter', 'slug' => 'planter', 'description' => 'Decorative planters including tortoise-shaped designs', 'sort_order' => 7],
            ['name' => 'Sculptures', 'slug' => 'sculptures', 'description' => 'Terracotta idols and figurines', 'sort_order' => 8],
            ['name' => 'Vase', 'slug' => 'vase', 'description' => 'Terracotta and decorative vases', 'sort_order' => 9],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
