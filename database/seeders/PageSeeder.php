<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about',
                'content' => '<h2>Welcome to Shilpkala</h2><p>India is the land of festivals. The traditions we follow every single year, when families come together and the legacies we leave behind. Generations after generations, we pass them down with love and care.</p><p>This love and care is what we aspire to radiate through our products. Handmade products each made with special care and precision, are perfect for your family this festival season, be it for gifting or your own home.</p><p>Each product is uniquely individual and hand crafted by the artists who work with utmost devotion, care and passion.</p><p>Based in New Delhi, Shilpkala brings you the finest handcrafted Indian handicraft products - from terracotta idols and traditional diyas to decorative vases and wall paintings.</p>',
                'meta_title' => 'About Shilpkala - Authentic Indian Handicraft',
                'meta_description' => 'Learn about Shilpkala, a New Delhi-based brand offering authentic handcrafted Indian handicraft products.',
            ],
            [
                'title' => 'FAQ',
                'slug' => 'faq',
                'content' => '<h2>Frequently Asked Questions</h2><h3>What materials are used?</h3><p>Our products are crafted using terracotta, acrylic paint, shilpkaar, organic colors, gota patti, stones, pearls, mirrors, and dori.</p><h3>Do you offer corporate gifting?</h3><p>Yes! Many of our products are available for corporate gifting. Contact us for bulk order pricing.</p><h3>How long does delivery take?</h3><p>Orders are typically dispatched within 2-3 business days. Delivery takes 5-7 days depending on your location.</p><h3>What is your return policy?</h3><p>We accept returns within 7 days of delivery for damaged or defective items. Please contact us with photos of the issue.</p><h3>Do you ship all over India?</h3><p>Yes, we ship to all major cities and towns across India.</p>',
                'meta_title' => 'FAQ - Shilpkala',
                'meta_description' => 'Frequently asked questions about Shilpkala handicraft products, shipping, returns, and more.',
            ],
            [
                'title' => 'Shipping & Returns',
                'slug' => 'shipping-returns',
                'content' => '<h2>Shipping Policy</h2><p>We ship across India. Orders are dispatched within 2-3 business days.</p><p>Free shipping on orders above ₹999. A flat rate of ₹50 applies to orders below ₹999.</p><h2>Returns Policy</h2><p>We accept returns within 7 days of delivery for damaged or defective items. Please contact us at sudhasharma9868@gmail.com with photos of the issue.</p><p>Refunds will be processed within 5-7 business days after we receive and inspect the returned item.</p>',
                'meta_title' => 'Shipping & Returns - Shilpkala',
                'meta_description' => 'Shipping and returns policy for Shilpkala handicraft products.',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<h2>Privacy Policy</h2><p>At Shilpkala, we are committed to protecting your privacy. This policy explains how we collect, use, and safeguard your personal information.</p><h3>Information We Collect</h3><p>We collect information you provide when placing orders, creating accounts, or contacting us - including your name, email, phone number, and shipping address.</p><h3>How We Use Your Information</h3><p>Your information is used to process orders, communicate about your purchases, and improve our services. We do not sell or share your personal information with third parties except as necessary to fulfill orders.</p><h3>Contact</h3><p>For privacy concerns, contact us at sudhasharma9868@gmail.com.</p>',
                'meta_title' => 'Privacy Policy - Shilpkala',
                'meta_description' => 'Shilpkala privacy policy - how we collect, use, and protect your personal information.',
            ],
            [
                'title' => 'Terms of Service',
                'slug' => 'terms-of-service',
                'content' => '<h2>Terms of Service</h2><p>By using shilpkalaworld.com, you agree to these terms.</p><h3>Products</h3><p>All products are handcrafted and may have minor variations in color, size, and design. This is a characteristic of handmade items and not a defect.</p><h3>Pricing</h3><p>All prices are in Indian Rupees (INR) and are subject to change without notice.</p><h3>Orders</h3><p>We reserve the right to refuse or cancel orders at our discretion. In case of cancellation, a full refund will be issued.</p><h3>Contact</h3><p>For questions about these terms, contact us at sudhasharma9868@gmail.com.</p>',
                'meta_title' => 'Terms of Service - Shilpkala',
                'meta_description' => 'Terms of service for shilpkalaworld.com.',
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
