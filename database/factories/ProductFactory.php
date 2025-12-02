<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Tomat Cherry', 'Cabai Rawit Hijau', 'Bawang Putih Tunggal',
            'Wortel Berastagi', 'Kentang Dieng', 'Brokoli Segar',
            'Jeruk Sunkist', 'Apel Fuji', 'Pisang Raja', 'Anggur Merah',
            'Mangga Harum Manis', 'Pepaya Bangkok', 'Beras Merah Organik',
            'Jagung Hibrida', 'Gandum Utuh', 'Kacang Hijau', 'Kedelai Impor',
            'Jahe Gajah', 'Kunyit Bubuk', 'Kayu Manis', 'Cengkeh',
            'Lada Putih', 'Serai Wangi', 'Daun Jeruk Purut', 'Terong Ungu',
            'Bayam Hijau', 'Sawi Putih', 'Labu Siam', 'Kencur', 'Lengkuas Thailand'
        ];

        $productName = $this->faker->unique()->randomElement($productNames);

        return [
            'category_id' => \App\Models\Category::factory(), // Akan di-handle di Seeder
            'name' => $productName,
            'description' => 'Produk pertanian berkualitas tinggi dari petani lokal. ' . $productName . ' dipanen segar dan memiliki banyak manfaat kesehatan.',
            'price' => $this->faker->numberBetween(8000, 50000), // Harga antara Rp 8.000 s/d Rp 50.000
        ];
    }
}
