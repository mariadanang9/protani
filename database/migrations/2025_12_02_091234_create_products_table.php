<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Foreign Key ke tabel categories
            $table->foreignId('category_id')
                ->constrained('categories') // Relasi ke tabel 'categories'
                ->onDelete('cascade');     // Jika kategori dihapus, produk ikut terhapus

            $table->string('name');
            $table->text('description');
            $table->float('price'); // Menggunakan float untuk harga
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
