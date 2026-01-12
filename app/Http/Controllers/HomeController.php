<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Services\RecommendationService;

class HomeController extends Controller
{
    protected $recommendationService;

    public function __construct(RecommendationService $recommendationService)
    {
        $this->recommendationService = $recommendationService;
    }

    public function index()
    {
        $categories = Category::withCount('products')->get();

        // Get personalized recommendations
        $recommendedProducts = $this->recommendationService->getRecommendations(6);

        // Get featured products (different from recommendations)
        $featuredProducts = Product::with('category')
            ->whereNotIn('id', $recommendedProducts->pluck('id'))
            ->inRandomOrder()
            ->limit(6)
            ->get();

        $totalProducts = Product::count();

        return view('home', compact('categories', 'featuredProducts', 'recommendedProducts', 'totalProducts'));
    }
}
