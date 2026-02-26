<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'Shilpkala', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Authentic Indian Handicraft', 'group' => 'general'],
            ['key' => 'site_email', 'value' => 'sudhasharma9868@gmail.com', 'group' => 'general'],
            ['key' => 'site_phone_1', 'value' => '+91-9868105731', 'group' => 'general'],
            ['key' => 'site_phone_2', 'value' => '+91-9868205731', 'group' => 'general'],
            ['key' => 'site_address', 'value' => '113, Evergreen Apartments, Sector-7, Plot No.-9, Dwarka, New Delhi-110075', 'group' => 'general'],

            // Social
            ['key' => 'social_instagram', 'value' => 'https://www.instagram.com/shilp_kala', 'group' => 'social'],
            ['key' => 'social_facebook', 'value' => 'https://www.facebook.com/shilpkala', 'group' => 'social'],
            ['key' => 'social_pinterest', 'value' => 'https://www.pinterest.com/shilpkala', 'group' => 'social'],
            ['key' => 'social_whatsapp', 'value' => '+919868105731', 'group' => 'social'],

            // Store
            ['key' => 'currency', 'value' => 'INR', 'group' => 'store'],
            ['key' => 'currency_symbol', 'value' => '₹', 'group' => 'store'],
            ['key' => 'tax_enabled', 'value' => '0', 'group' => 'store'],
            ['key' => 'guest_checkout', 'value' => '1', 'group' => 'store'],
            ['key' => 'products_per_page', 'value' => '16', 'group' => 'store'],

            // Shipping
            ['key' => 'free_shipping_threshold', 'value' => '999', 'group' => 'shipping'],
            ['key' => 'flat_shipping_rate', 'value' => '50', 'group' => 'shipping'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
