<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            // Sayuran
            ['Tomat Organik', 'Sayuran segar organik tanpa pestisida', 15000, 25000, 'kg', 'Bandung'],
            ['Cabai Merah Keriting', 'Cabai segar tingkat kepedasan tinggi', 35000, 55000, 'kg', 'Brebes'],
            ['Bawang Merah', 'Bawang merah berkualitas premium', 40000, 50000, 'kg', 'Brebes'],
            ['Kentang', 'Kentang ukuran besar untuk berbagai masakan', 12000, 18000, 'kg', 'Dieng'],
            ['Wortel', 'Wortel segar kaya vitamin A', 10000, 15000, 'kg', 'Berastagi'],
            ['Bayam Hijau', 'Bayam segar kaya zat besi', 8000, 12000, 'ikat', 'Lembang'],
            ['Kangkung', 'Kangkung segar untuk berbagai olahan', 5000, 8000, 'ikat', 'Bogor'],
            ['Sawi Hijau', 'Sawi hijau segar dan renyah', 7000, 10000, 'ikat', 'Bandung'],
            ['Terong Ungu', 'Terong ungu segar untuk berbagai masakan', 12000, 18000, 'kg', 'Garut'],
            ['Timun', 'Timun segar dan renyah', 8000, 12000, 'kg', 'Sukabumi'],

            // Buah-buahan
            ['Jeruk Medan', 'Jeruk manis dari Medan', 20000, 30000, 'kg', 'Medan'],
            ['Apel Malang', 'Apel segar dari Malang', 25000, 35000, 'kg', 'Malang'],
            ['Pisang Cavendish', 'Pisang manis dan bergizi', 15000, 20000, 'sisir', 'Lampung'],
            ['Mangga Gedong', 'Mangga manis khas Indonesia', 18000, 28000, 'kg', 'Indramayu'],
            ['Pepaya California', 'Pepaya manis dan segar', 12000, 18000, 'kg', 'Sukabumi'],
            ['Semangka', 'Semangka merah manis', 8000, 12000, 'kg', 'Mojokerto'],
            ['Melon', 'Melon segar dan manis', 15000, 22000, 'kg', 'Gresik'],
            ['Alpukat', 'Alpukat mentega berkualitas', 25000, 35000, 'kg', 'Bogor'],
            ['Durian', 'Durian legit dari Medan', 50000, 80000, 'kg', 'Medan'],
            ['Salak Pondoh', 'Salak manis dari Yogyakarta', 15000, 22000, 'kg', 'Sleman'],

            // Biji-bijian
            ['Beras Premium', 'Beras putih berkualitas premium', 12000, 15000, 'kg', 'Karawang'],
            ['Jagung Manis', 'Jagung manis segar', 8000, 12000, 'kg', 'Kediri'],
            ['Kedelai Lokal', 'Kedelai organik lokal', 10000, 14000, 'kg', 'Grobogan'],
            ['Kacang Tanah', 'Kacang tanah berkualitas', 22000, 30000, 'kg', 'Tuban'],
            ['Gandum', 'Gandum berkualitas untuk olahan', 15000, 25000, 'kg', 'Magelang'],
            ['Kacang Hijau', 'Kacang hijau segar', 18000, 25000, 'kg', 'Wonogiri'],
            ['Beras Merah', 'Beras merah organik', 15000, 20000, 'kg', 'Bantul'],

            // Rempah-rempah
            ['Jahe Merah', 'Jahe merah berkhasiat tinggi', 28000, 40000, 'kg', 'Purworejo'],
            ['Kunyit', 'Kunyit segar untuk bumbu dan obat', 18000, 25000, 'kg', 'Bantul'],
            ['Lengkuas', 'Lengkuas segar untuk bumbu', 15000, 22000, 'kg', 'Temanggung'],
            ['Serai', 'Serai segar untuk masakan dan minuman', 10000, 15000, 'ikat', 'Bogor'],
            ['Daun Salam', 'Daun salam kering', 8000, 12000, 'kg', 'Garut'],
            ['Cengkeh', 'Cengkeh kering berkualitas', 180000, 220000, 'kg', 'Maluku'],
            ['Pala', 'Pala utuh berkualitas export', 150000, 200000, 'kg', 'Maluku'],
        ];

        $product = $this->faker->randomElement($products);
        $name = $product[0];

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->numberBetween(1, 1000),
            'description' => $product[1],
            'price' => $this->faker->numberBetween($product[2], $product[3]),
            'stock' => $this->faker->numberBetween(50, 500),
            'unit' => $product[4],
            'origin' => $product[5],
        ];
    }
}
