<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'customer_name' => 'Arun Sharma',
                'content' => 'The quality of their products is simply awesome. Each piece is handcrafted with such care and attention to detail. Truly authentic Indian handicrafts.',
                'image' => null,
                'rating' => 5,
                'sort_order' => 1,
            ],
            [
                'customer_name' => 'Dr. Drishti Sharma',
                'content' => 'All the items they have are hand-picked and assorted. The craftsmanship is beautiful and the packaging was excellent. Highly recommended!',
                'image' => null,
                'rating' => 5,
                'sort_order' => 2,
            ],
            [
                'customer_name' => 'Simran Malhotra',
                'content' => 'Amazing for the price I paid. Unable to find it at the same price anywhere else. Great stuff, especially to be gifted to someone.',
                'image' => null,
                'rating' => 5,
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
