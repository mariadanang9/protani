<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // <-- Import Model Product
use App\Models\Category; // <-- Import Model Category (untuk filter kategori di masa depan)

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // 1. Inisialisasi Query Builder
        // Gunakan 'with' untuk eager loading Category
        $query = Product::with('category');

        // --- 2. FITUR PENCARIAN (Search) ---
        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                // Pencarian berdasarkan nama produk ATAU deskripsi
                $q->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
            });
        }

        // --- 3. FITUR FILTER HARGA (Price Filter) ---
        $priceMin = $request->input('price_min');
        $priceMax = $request->input('price_max');

        if ($priceMin) {
            $query->where('price', '>=', $priceMin);
        }
        if ($priceMax) {
            // Jika priceMax ada, cek jika nilainya lebih besar dari 0
            if ($priceMax > 0) {
                $query->where('price', '<=', $priceMax);
            }
        }

        // --- 4. FITUR SORTING (Sort) ---
        $sort = $request->input('sort');

        if ($sort) {
            switch ($sort) {
                case 'name_asc':
                    $query->orderBy('name', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('name', 'desc');
                    break;
                case 'price_asc':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_desc':
                    $query->orderBy('price', 'desc');
                    break;
                default:
                    // Default sort jika tidak ada atau tidak valid
                    $query->latest();
                    break;
            }
        } else {
            // Default sort jika tidak ada parameter sort
            $query->latest();
        }

        // 5. Eksekusi Query dan ambil hasilnya
        $products = $query->get();

        // 6. Ambil semua Kategori untuk digunakan di Filter/Sidebar View
        $categories = Category::all();

        return view('products.list', compact('products', 'categories'));
    }
}
