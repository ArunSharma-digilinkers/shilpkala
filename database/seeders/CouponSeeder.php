<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        Coupon::create([
            'code' => 'WELCOME10',
            'type' => 'percentage',
            'value' => 10,
            'min_order_amount' => 500,
            'max_uses' => 100,
            'expires_at' => now()->addYear(),
        ]);

        Coupon::create([
            'code' => 'FLAT100',
            'type' => 'fixed',
            'value' => 100,
            'min_order_amount' => 1000,
            'max_uses' => 50,
            'expires_at' => now()->addMonths(6),
        ]);
    }
}
