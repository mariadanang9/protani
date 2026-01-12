<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    /**
     * Display user's wishlist
     */
    public function index()
    {
        $wishlists = Auth::user()->wishlists()
            ->with('product.category')
            ->latest()
            ->get();

        return view('wishlist.index', compact('wishlists'));
    }

    /**
     * Add product to wishlist
     */
    public function add(Product $product)
    {
        // Check if already in wishlist
        $exists = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->exists();

        if ($exists) {
            return back()->with('info', '❤️ Produk sudah ada di wishlist Anda!');
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);

        return back()->with('success', '❤️ Produk berhasil ditambahkan ke wishlist!');
    }

    /**
     * Remove product from wishlist
     */
    public function remove(Wishlist $wishlist)
    {
        // Authorization: make sure user owns this wishlist item
        if ($wishlist->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $productName = $wishlist->product->name;
        $wishlist->delete();

        return back()->with('success', '💔 ' . $productName . ' dihapus dari wishlist!');
    }

    /**
     * Toggle wishlist (add if not exist, remove if exist)
     */
    public function toggle(Product $product)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($wishlist) {
            // Remove from wishlist
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'action' => 'removed',
                'message' => 'Dihapus dari wishlist'
            ]);
        } else {
            // Add to wishlist
            Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);
            return response()->json([
                'success' => true,
                'action' => 'added',
                'message' => 'Ditambahkan ke wishlist'
            ]);
        }
    }

    /**
     * Clear all wishlist
     */
    public function clear()
    {
        Auth::user()->wishlists()->delete();

        return back()->with('success', '🗑️ Wishlist berhasil dikosongkan!');
    }
}
