<?php

namespace Database\Seeders;

use App\Models\Motorcycle;
use Illuminate\Database\Seeder;

class MotorcycleSeeder extends Seeder
{
    public function run(): void
    {
        $brands = \App\Models\Brand::pluck('id');

        $data = [
            ['brand_id' => $brands[0], 'name' => 'MT-07', 'slug' => 'yamaha-mt-07', 'year' => 2022, 'price' => 850000, 'status' => 'available'],
            ['brand_id' => $brands[1], 'name' => 'CB650R', 'slug' => 'honda-cb650r', 'year' => 2021, 'price' => 920000, 'status' => 'available'],
            ['brand_id' => $brands[2], 'name' => 'Z650', 'slug' => 'kawasaki-z650', 'year' => 2023, 'price' => 790000, 'status' => 'available'],
        ];

        foreach ($data as $item) {
            Motorcycle::create($item + ['created_at' => now(), 'updated_at' => now()]);
        }
    }
}
