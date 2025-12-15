<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Show Order History
    public function index()
    {
        $orders = Auth::user()->orders()
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // Show Order Detail
    public function show(Order $order)
    {
        // Authorization: make sure user owns this order
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $order->load(['orderItems.product.category']);

        return view('orders.show', compact('order'));
    }

    // Show Checkout Page
    public function create()
    {
        $carts = Auth::user()->carts()->with('product')->get();

        // Redirect if cart is empty
        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong!');
        }

        // Calculate total
        $total = $carts->sum(function($cart) {
            return $cart->subtotal;
        });

        return view('orders.checkout', compact('carts', 'total'));
    }

    // Process Checkout
    public function store(Request $request)
    {
        // Validate form
        $validated = $request->validate([
            'shipping_address' => 'required|string|min:10',
            'payment_method' => 'required|in:transfer,cod,ewallet'
        ]);

        // Get user's cart
        $carts = Auth::user()->carts()->with('product')->get();

        // Check if cart is empty
        if ($carts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja Anda kosong!');
        }

        // Validate stock availability for all items
        foreach ($carts as $cart) {
            if ($cart->quantity > $cart->product->stock) {
                return back()->with('error',
                    'Stok ' . $cart->product->name . ' tidak mencukupi! Stok tersedia: ' .
                    $cart->product->stock . ' ' . $cart->product->unit
                );
            }
        }

        // Calculate total
        $total = $carts->sum(function($cart) {
            return $cart->subtotal;
        });

        // Use database transaction for data consistency
        DB::beginTransaction();

        try {
            // Create order
            $order = Order::create([
                'user_id' => Auth::id(),
                'total_price' => $total,
                'shipping_address' => $validated['shipping_address'],
                'payment_method' => $validated['payment_method'],
                'status' => 'pending'
            ]);

            // Create order items and update product stock
            foreach ($carts as $cart) {
                // Create order item
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->product->price // Save current price for history
                ]);

                // Update product stock
                $cart->product->decrement('stock', $cart->quantity);
            }

            // Clear user's cart
            Auth::user()->carts()->delete();

            // Commit transaction
            DB::commit();

            return redirect()->route('orders.show', $order->id)
                ->with('success', '🎉 Pesanan berhasil dibuat! Terima kasih telah berbelanja di Protani.');

        } catch (\Exception $e) {
            // Rollback transaction if error occurs
            DB::rollBack();

            return back()->with('error', 'Terjadi kesalahan saat memproses pesanan. Silakan coba lagi.');
        }
    }

    // Cancel Order (optional feature)
    public function cancel(Order $order)
    {
        // Authorization
        if ($order->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Only pending orders can be cancelled
        if ($order->status !== 'pending') {
            return back()->with('error', 'Pesanan ini tidak dapat dibatalkan.');
        }

        DB::beginTransaction();

        try {
            // Return stock
            foreach ($order->orderItems as $item) {
                $item->product->increment('stock', $item->quantity);
            }

            // Update order status
            $order->update(['status' => 'cancelled']);

            DB::commit();

            return back()->with('success', 'Pesanan berhasil dibatalkan. Stok produk telah dikembalikan.');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan saat membatalkan pesanan.');
        }
    }
}
