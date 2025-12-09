<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Sayuran',
                'slug' => 'sayuran',
                'description' => 'Berbagai jenis sayuran segar dari petani lokal',
                'icon' => '🥬'
            ],
            [
                'name' => 'Buah-buahan',
                'slug' => 'buah-buahan',
                'description' => 'Buah segar pilihan dengan kualitas terbaik',
                'icon' => '🍎'
            ],
            [
                'name' => 'Biji-bijian',
                'slug' => 'biji-bijian',
                'description' => 'Biji-bijian berkualitas untuk kebutuhan pangan',
                'icon' => '🌾'
            ],
            [
                'name' => 'Rempah-rempah',
                'slug' => 'rempah-rempah',
                'description' => 'Rempah asli Indonesia untuk bumbu masakan',
                'icon' => '🌶️'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
