<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Show Cart Page
    public function index()
    {
        $carts = Auth::user()->carts()->with('product')->get();

        // Calculate total
        $total = $carts->sum(function($cart) {
            return $cart->subtotal;
        });

        return view('cart.index', compact('carts', 'total'));
    }

    // Add Product to Cart
    public function add(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $product->stock
        ]);

        // Check if product already in cart
        $existingCart = Cart::where('user_id', Auth::id())
                            ->where('product_id', $product->id)
                            ->first();

        if ($existingCart) {
            // Update quantity if already exists
            $newQuantity = $existingCart->quantity + $validated['quantity'];

            // Check stock availability
            if ($newQuantity > $product->stock) {
                return back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $product->stock . ' ' . $product->unit);
            }

            $existingCart->update([
                'quantity' => $newQuantity
            ]);

            return back()->with('success', '✅ Jumlah produk di keranjang berhasil diperbarui!');
        }

        // Create new cart item
        Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
            'quantity' => $validated['quantity']
        ]);

        return back()->with('success', '🛒 Produk berhasil ditambahkan ke keranjang!');
    }

    // Update Cart Quantity
    public function update(Request $request, Cart $cart)
    {
        // Authorization: make sure user owns this cart
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $cart->product->stock
        ]);

        // Check stock
        if ($validated['quantity'] > $cart->product->stock) {
            return back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $cart->product->stock . ' ' . $cart->product->unit);
        }

        $cart->update([
            'quantity' => $validated['quantity']
        ]);

        return back()->with('success', '✅ Jumlah produk berhasil diperbarui!');
    }

    // Remove from Cart
    public function remove(Cart $cart)
    {
        // Authorization: make sure user owns this cart
        if ($cart->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $productName = $cart->product->name;
        $cart->delete();

        return back()->with('success', '🗑️ ' . $productName . ' berhasil dihapus dari keranjang!');
    }

    // Clear all cart
    public function clear()
    {
        Auth::user()->carts()->delete();

        return back()->with('success', '🗑️ Keranjang berhasil dikosongkan!');
    }
}
