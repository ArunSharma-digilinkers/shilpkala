<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::pluck('id', 'slug');

        $products = [
            [
                'name' => 'Ganpati Idol',
                'slug' => 'ganpati-idol',
                'sku' => 'SG1',
                'price' => 4000,
                'stock' => 5,
                'weight' => 2,
                'height' => 24,
                'length' => 15,
                'width' => 9,
                'category' => 'sculptures',
                'is_featured' => true,
                'short_description' => 'Terracotta Ganpati idol to bless your home. Crafted skillfully with acrylic paint.',
                'description' => 'Terracotta Ganpati idol to bless your home. Crafted skillfully just for you and your dear ones. Size: Idol: 24x15x9 inches, Bell: 11x8 inches. Work done with acrylic paint.',
                'images' => [
                    ['path' => 'ganpati.png', 'primary' => true],
                    ['path' => 'ganpati1.png'],
                    ['path' => 'ganpati2.png'],
                    ['path' => 'ganpati3.png'],
                ],
            ],
            [
                'name' => 'Wall Painting',
                'slug' => 'wall-painting',
                'sku' => 'PW1',
                'price' => 1000,
                'stock' => 5,
                'weight' => 0.5,
                'height' => 35,
                'width' => 43,
                'category' => 'paintings',
                'is_featured' => true,
                'short_description' => 'Unique colourful 3D effect painting hand crafted with precision.',
                'description' => 'Unique colourful 3D effect painting hand crafted with precision. Size: 43x35 cm. Work done with acrylic paint and shilpkaar.',
                'images' => [
                    ['path' => 'painting1.png', 'primary' => true],
                    ['path' => 'painting2.png'],
                ],
            ],
            [
                'name' => 'Wall Painting Large',
                'slug' => 'wall-painting-large',
                'sku' => 'PW2',
                'price' => 1000,
                'stock' => 5,
                'weight' => 0.5,
                'height' => 88,
                'width' => 110,
                'category' => 'paintings',
                'is_featured' => false,
                'short_description' => 'Large 3D effect painting hand crafted with precision.',
                'description' => 'Large unique colourful 3D effect painting hand crafted with precision. Size: 110x88 cm. Work done with acrylic paint and shilpkaar.',
                'images' => [
                    ['path' => 'painting3.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Rajasthani Couple',
                'slug' => 'rajasthani-couple',
                'sku' => 'SRC',
                'price' => 900,
                'stock' => 5,
                'weight' => 1,
                'height' => 48,
                'width' => 13,
                'category' => 'sculptures',
                'is_featured' => true,
                'short_description' => 'Hand crafted mask of a Rajasthani Couple, decorated with pleasing colors.',
                'description' => 'Hand crafted mask of a Rajasthani Couple, decorated with pleasing colors. Only organic colors used. Available for corporate gifting. Size: 48x13 cm.',
                'images' => [
                    ['path' => 'rajasthanicouple.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Hanging Diya Lantern',
                'slug' => 'hanging-diya-lantern',
                'sku' => 'HD1',
                'price' => 400,
                'stock' => 10,
                'weight' => 0.5,
                'height' => 15,
                'width' => 7,
                'category' => 'diyas',
                'is_featured' => true,
                'short_description' => 'Hand crafted Diya, decorated with pleasing organic colors. Perfect for Diwali.',
                'description' => 'Hand crafted Diya, decorated with pleasing colors. Only organic colors used. Available in various colors. Perfect for Diwali. Available for corporate gifting. Set of 3.',
                'images' => [
                    ['path' => 'diya-1.png', 'primary' => true],
                    ['path' => 'diya-4.png'],
                    ['path' => 'diya-5.png'],
                ],
            ],
            [
                'name' => 'Hanging Diya Lantern Small',
                'slug' => 'hanging-diya-lantern-small',
                'sku' => 'HDL',
                'price' => 150,
                'stock' => 5,
                'weight' => 0.3,
                'height' => 14,
                'width' => 7,
                'category' => 'diyas',
                'is_featured' => false,
                'short_description' => 'Small hand crafted Diya, perfect for festival decoration.',
                'description' => 'Small hand crafted Diya, decorated with pleasing colors. Only organic colors used. Perfect for Diwali and festival decoration.',
                'images' => [
                    ['path' => 'diya-8.png', 'primary' => true],
                    ['path' => 'diya-9.png'],
                    ['path' => 'diya-10.png'],
                ],
            ],
            [
                'name' => 'Decorative Envelopes',
                'slug' => 'decorative-envelopes',
                'sku' => 'ED1',
                'price' => 300,
                'stock' => 100,
                'category' => 'envelopes',
                'is_featured' => true,
                'short_description' => 'Handmade envelopes with gota Patti and stones for personal touch in gifting.',
                'description' => 'Handmade envelopes to give personal touch in gifting. Made with hand made sheets and gota Patti with stones. Closure style: with help of bamboo stick. Set of 6.',
                'images' => [
                    ['path' => 'envelopes1.png', 'primary' => true],
                    ['path' => 'envelopes2.png'],
                ],
            ],
            [
                'name' => 'Decorative Envelopes Pack',
                'slug' => 'decorative-envelopes-pack',
                'sku' => 'ED2',
                'price' => 300,
                'stock' => 10,
                'category' => 'envelopes',
                'is_featured' => false,
                'short_description' => 'Premium handmade envelopes, perfect for wedding and festival gifting.',
                'description' => 'Premium handmade envelopes to give personal touch in gifting. Made with hand made sheets and gota Patti with stones. Set of 6.',
                'images' => [
                    ['path' => 'envelopes3.png', 'primary' => true],
                    ['path' => 'envelopes4.png'],
                ],
            ],
            [
                'name' => 'Stone Envelopes',
                'slug' => 'stone-envelopes',
                'sku' => 'ED3',
                'price' => 240,
                'stock' => 10,
                'category' => 'envelopes',
                'is_featured' => false,
                'short_description' => 'Elegant stone-decorated handmade envelopes.',
                'description' => 'Handmade envelopes decorated with beautiful stones. Perfect for gifting. Set of 6.',
                'images' => [
                    ['path' => 'envelopes5.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Pearl Envelopes',
                'slug' => 'pearl-envelopes',
                'sku' => 'ED4',
                'price' => 240,
                'stock' => 10,
                'category' => 'envelopes',
                'is_featured' => false,
                'short_description' => 'Pearl-decorated handmade envelopes for elegant gifting.',
                'description' => 'Handmade envelopes decorated with pearls. Perfect for elegant gifting. Set of 6.',
                'images' => [
                    ['path' => 'envelopes6.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Round Vase',
                'slug' => 'round-vase',
                'sku' => 'VR1',
                'price' => 300,
                'stock' => 10,
                'weight' => 1,
                'height' => 25,
                'width' => 10,
                'category' => 'vase',
                'is_featured' => false,
                'short_description' => 'Hand crafted round vase, decorated with organic colors.',
                'description' => 'Hand crafted round vase, decorated with pleasing colors. Only organic colors. Size: 25x10 cm.',
                'images' => [
                    ['path' => 'vase-1.png', 'primary' => true],
                    ['path' => 'vase-2.png'],
                ],
            ],
            [
                'name' => 'Vase',
                'slug' => 'vase',
                'sku' => 'VR2',
                'price' => 300,
                'stock' => 10,
                'weight' => 0.5,
                'height' => 28,
                'width' => 10,
                'category' => 'vase',
                'is_featured' => false,
                'short_description' => 'Elegant hand crafted vase with organic colors.',
                'description' => 'Hand crafted vase, decorated with pleasing colors. Only organic colors. Size: 28x10 cm.',
                'images' => [
                    ['path' => 'vase-3.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Terracotta Vase',
                'slug' => 'terracotta-vase',
                'sku' => 'VT1',
                'price' => 2000,
                'stock' => 5,
                'weight' => 1.2,
                'height' => 70,
                'category' => 'vase',
                'is_featured' => true,
                'short_description' => 'Hand crafted pot with shilpkaar, mirror, acrylic paint and dori.',
                'description' => 'Hand crafted Pot, decorated with pleasing colors. Only organic colors. Work done with shilpkaar, mirror, acrylic paint and dori. Height: 29 inches. Available in different sizes.',
                'images' => [
                    ['path' => 'vase-9.png', 'primary' => true],
                    ['path' => 'vase-10.png'],
                    ['path' => 'vase-11.png'],
                ],
            ],
            [
                'name' => 'Vase Pack - Set of Four',
                'slug' => 'vase-pack-set-of-four',
                'sku' => 'VP1',
                'price' => 800,
                'stock' => 5,
                'category' => 'vase',
                'is_featured' => true,
                'short_description' => 'Hand crafted Vase set, decorated with organic colors. Ideal decoration.',
                'description' => 'Hand crafted Vase set of four, decorated with pleasing colors. Only organic colors. Available in different sizes, ideal decoration. Available for corporate gifting.',
                'images' => [
                    ['path' => 'vase-7.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Wall Clock',
                'slug' => 'wall-clock',
                'sku' => 'WC1',
                'price' => 1200,
                'stock' => 5,
                'weight' => 0.5,
                'height' => 35,
                'width' => 43,
                'category' => 'paintings',
                'is_featured' => false,
                'short_description' => 'Decorative wall clock with hand painted details.',
                'description' => 'Decorative wall clock with hand painted details. Size: 43x35 cm. Work done with acrylic paint.',
                'images' => [
                    ['path' => 'clock.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Doli Jewellery Box',
                'slug' => 'doli-jewellery-box',
                'sku' => 'JB1',
                'price' => 300,
                'stock' => 10,
                'weight' => 0.4,
                'height' => 10,
                'length' => 13,
                'width' => 7,
                'category' => 'jewellery-box',
                'is_featured' => true,
                'short_description' => 'Hand crafted miniature Doli, useful for holding small items. Wonderful gift item.',
                'description' => 'Hand crafted miniature Doli, useful for holding small items. Wonderful gift item. Size: 5x4x3 inches. Work done with shilpkaar, acrylic paint and pearls.',
                'images' => [
                    ['path' => 'doli-1.png', 'primary' => true],
                    ['path' => 'doli-2.png'],
                    ['path' => 'doli-3.png'],
                    ['path' => 'doli-5.png'],
                ],
            ],
            [
                'name' => 'Decorative Planter',
                'slug' => 'decorative-planter',
                'sku' => 'PD1',
                'price' => 1000,
                'stock' => 3,
                'weight' => 0.5,
                'category' => 'planter',
                'is_featured' => true,
                'short_description' => 'Hand crafted planter in shape of a tortoise. Ideal decoration and vastu effect.',
                'description' => 'Hand crafted planter in shape of a tortoise, decorated with pleasing colors. Only organic colors. Ideal decoration and vastu effect. Available for corporate gifting.',
                'images' => [
                    ['path' => 'planter.png', 'primary' => true],
                    ['path' => 'planter1.png'],
                ],
            ],
            [
                'name' => 'Floating Candles',
                'slug' => 'floating-candles',
                'sku' => 'FC1',
                'price' => 500,
                'stock' => 10,
                'category' => 'candles',
                'is_featured' => true,
                'short_description' => 'Handmade container to light up your home with soft pleasant floating candles.',
                'description' => 'Handmade container to light up your home with soft pleasant floating candles. Size: Standard. Made with clay and decorated with acrylic paints and shilpkar.',
                'images' => [
                    ['path' => 'floatingcandle.png', 'primary' => true],
                ],
            ],
            [
                'name' => 'Hanging Mirror',
                'slug' => 'hanging-mirror',
                'sku' => 'HM1',
                'price' => 500,
                'stock' => 3,
                'category' => 'mirrors',
                'is_featured' => false,
                'short_description' => 'Decorative hanging mirror with handcrafted frame.',
                'description' => 'Decorative hanging mirror with handcrafted frame. Beautiful addition to any room.',
                'images' => [
                    ['path' => 'hangingmirror.png', 'primary' => true],
                ],
            ],
        ];

        foreach ($products as $data) {
            $images = $data['images'];
            $categorySlug = $data['category'];
            unset($data['images'], $data['category']);

            $data['category_id'] = $categories[$categorySlug] ?? null;

            $product = Product::create($data);

            foreach ($images as $i => $img) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $img['path'],
                    'alt_text' => $product->name,
                    'sort_order' => $i,
                    'is_primary' => $img['primary'] ?? false,
                ]);
            }
        }
    }
}
