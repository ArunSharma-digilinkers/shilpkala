<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@shilpkala.com',
            'password' => bcrypt('admin123'),
            'phone' => '+91-9868105731',
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}
