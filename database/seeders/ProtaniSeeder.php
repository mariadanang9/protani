<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;

class ProtaniSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Definisikan Kategori (minimal 3)
        $categories = [
            ['name' => 'Sayuran', 'slug' => Str::slug('Sayuran')],
            ['name' => 'Buah-buahan', 'slug' => Str::slug('Buah-buahan')],
            ['name' => 'Biji-bijian & Kacang', 'slug' => Str::slug('Biji-bijian & Kacang')],
            ['name' => 'Rempah-rempah', 'slug' => Str::slug('Rempah-rempah')], // Total 4 kategori
        ];

        // 2. Simpan Kategori ke database
        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // 3. Ambil semua ID Kategori
        $categoryIds = Category::pluck('id')->toArray();

        // 4. Buat minimal 30 Produk
        // Looping 35 kali agar pasti 30+
        for ($i = 0; $i < 35; $i++) {
            Product::factory()->create([
                // Distribusikan produk secara acak ke salah satu kategori
                'category_id' => $categoryIds[array_rand($categoryIds)],
            ]);
        }
    }
}
