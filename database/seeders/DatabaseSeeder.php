<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed categories dulu
        $this->call([
            CategorySeeder::class,
        ]);

        // Lalu seed 35 products menggunakan factory
        Product::factory(35)->create();
    }
}
