<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        Brand::insert([
            ['name' => 'Yamaha', 'slug' => 'yamaha', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Honda', 'slug' => 'honda', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Kawasaki', 'slug' => 'kawasaki', 'is_active' => true, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
