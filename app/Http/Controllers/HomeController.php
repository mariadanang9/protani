<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get();
        $featuredProducts = Product::with('category')
            ->inRandomOrder()
            ->limit(6)
            ->get();
        $totalProducts = Product::count();

        return view('home', compact('categories', 'featuredProducts', 'totalProducts'));
    }
}
