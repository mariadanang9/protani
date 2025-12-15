<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seed users first
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
        ]);

        // Then seed products
        Product::factory(35)->create();
    }
}
