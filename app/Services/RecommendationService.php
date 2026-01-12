<?php

namespace App\Services;

use App\Models\Product;
use App\Models\UserActivityLog;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RecommendationService
{
    /**
     * Get personalized product recommendations for user
     *
     * @param int $limit Number of products to recommend
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRecommendations($limit = 6)
    {
        if (Auth::check()) {
            return $this->getAuthenticatedUserRecommendations($limit);
        } else {
            return $this->getGuestRecommendations($limit);
        }
    }

    /**
     * Get recommendations for authenticated users
     */
    private function getAuthenticatedUserRecommendations($limit)
    {
        $userId = Auth::id();

        // Get user's activity and preferences
        $viewedProducts = $this->getUserViewedProducts($userId);
        $purchasedProducts = $this->getUserPurchasedProducts($userId);
        $cartProducts = $this->getUserCartProducts($userId);

        // Combine all product interactions
        $allInteractedProducts = collect()
            ->merge($viewedProducts)
            ->merge($purchasedProducts)
            ->merge($cartProducts)
            ->unique();

        if ($allInteractedProducts->isEmpty()) {
            // No history, return popular products
            return $this->getPopularProducts($limit);
        }

        // Get categories user is interested in
        $interestedCategories = Product::whereIn('id', $allInteractedProducts)
            ->pluck('category_id')
            ->unique()
            ->toArray();

        // Get recommended products
        $recommendations = Product::query()
            // Same categories as user's interests
            ->whereIn('category_id', $interestedCategories)
            // Exclude already interacted products
            ->whereNotIn('id', $allInteractedProducts)
            // Only in-stock products
            ->where('stock', '>', 0)
            // Order by rating and reviews
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->orderByDesc('reviews_count')
            ->limit($limit * 2) // Get more to filter
            ->get();

        // If not enough, add popular products from other categories
        if ($recommendations->count() < $limit) {
            $additional = $this->getPopularProducts($limit - $recommendations->count())
                ->whereNotIn('id', $allInteractedProducts)
                ->whereNotIn('id', $recommendations->pluck('id'));

            $recommendations = $recommendations->merge($additional);
        }

        return $recommendations->take($limit);
    }

    /**
     * Get recommendations for guest users (session-based)
     */
    private function getGuestRecommendations($limit)
    {
        $sessionId = session()->getId();

        // Get viewed products in current session
        $viewedProducts = UserActivityLog::where('session_id', $sessionId)
            ->where('activity_type', UserActivityLog::TYPE_VIEW)
            ->pluck('product_id')
            ->unique();

        if ($viewedProducts->isEmpty()) {
            return $this->getPopularProducts($limit);
        }

        // Get categories from viewed products
        $categories = Product::whereIn('id', $viewedProducts)
            ->pluck('category_id')
            ->unique()
            ->toArray();

        // Recommend products from same categories
        return Product::query()
            ->whereIn('category_id', $categories)
            ->whereNotIn('id', $viewedProducts)
            ->where('stock', '>', 0)
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->orderByDesc('reviews_count')
            ->limit($limit)
            ->get();
    }

    /**
     * Get user's viewed products
     */
    private function getUserViewedProducts($userId)
    {
        return UserActivityLog::where('user_id', $userId)
            ->where('activity_type', UserActivityLog::TYPE_VIEW)
            ->where('created_at', '>=', now()->subDays(30)) // Last 30 days
            ->pluck('product_id')
            ->unique();
    }

    /**
     * Get user's purchased products
     */
    private function getUserPurchasedProducts($userId)
    {
        return Order::where('user_id', $userId)
            ->where('status', '!=', 'cancelled')
            ->with('orderItems')
            ->get()
            ->pluck('orderItems')
            ->flatten()
            ->pluck('product_id')
            ->unique();
    }

    /**
     * Get products in user's cart
     */
    private function getUserCartProducts($userId)
    {
        return Auth::user()->carts()->pluck('product_id')->unique();
    }

    /**
     * Get popular products (fallback)
     */
    private function getPopularProducts($limit)
    {
        return Product::query()
            ->where('stock', '>', 0)
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_count')
            ->orderByDesc('reviews_avg_rating')
            ->limit($limit)
            ->get();
    }

    /**
     * Log user activity
     */
    public static function logActivity($productId, $activityType, $userId = null)
    {
        $weight = match($activityType) {
            UserActivityLog::TYPE_VIEW => UserActivityLog::WEIGHT_VIEW,
            UserActivityLog::TYPE_CART => UserActivityLog::WEIGHT_CART,
            UserActivityLog::TYPE_PURCHASE => UserActivityLog::WEIGHT_PURCHASE,
            default => 1
        };

        UserActivityLog::create([
            'user_id' => $userId ?? Auth::id(),
            'product_id' => $productId,
            'activity_type' => $activityType,
            'weight' => $weight,
            'session_id' => session()->getId(),
            'created_at' => now()
        ]);
    }

    /**
     * Get similar products based on current product
     */
    public function getSimilarProducts($product, $limit = 4)
    {
        return Product::query()
            // Same category
            ->where('category_id', $product->category_id)
            // Exclude current product
            ->where('id', '!=', $product->id)
            // Only in-stock
            ->where('stock', '>', 0)
            // Similar price range (±30%)
            ->whereBetween('price', [
                $product->price * 0.7,
                $product->price * 1.3
            ])
            // Order by rating
            ->withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->orderByDesc('reviews_count')
            ->limit($limit)
            ->get();
    }
}
