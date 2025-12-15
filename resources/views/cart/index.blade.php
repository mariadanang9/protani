<x-layout>
    <x-slot:title>Keranjang Belanja</x-slot:title>

    <div class="cart-header mb-4">
        <h1 class="fw-bold">🛒 Keranjang Belanja</h1>
        <p class="text-muted">Kelola produk yang ingin Anda beli</p>
    </div>

    @if($carts->isEmpty())
        <div class="empty-cart text-center py-5">
            <div class="empty-icon mb-4">🛒</div>
            <h3 class="mb-3">Keranjang Anda Kosong</h3>
            <p class="text-muted mb-4">Yuk, mulai belanja produk pertanian berkualitas!</p>
            <a href="{{ route('products') }}" class="btn btn-success btn-lg">
                🌾 Belanja Sekarang
            </a>
        </div>
    @else
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center py-3">
                        <h5 class="mb-0">Produk ({{ $carts->count() }} item)</h5>
                        <form action="{{ route('cart.clear') }}" method="POST"
                              onsubmit="return confirm('Yakin ingin mengosongkan keranjang?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                🗑️ Kosongkan Keranjang
                            </button>
                        </form>
                    </div>
                    <div class="card-body p-0">
                        @foreach($carts as $cart)
                            <div class="cart-item p-3 border-bottom">
                                <div class="row align-items-center">
                                    <!-- Product Info -->
                                    <div class="col-md-5">
                                        <div class="d-flex align-items-center">
                                            <div class="product-icon me-3">
                                                {{ $cart->product->category->icon }}
                                            </div>
                                            <div>
                                                <h6 class="mb-1">
                                                    <a href="{{ route('products.show', $cart->product->id) }}"
                                                       class="text-decoration-none text-dark fw-bold">
                                                        {{ $cart->product->name }}
                                                    </a>
                                                </h6>
                                                <small class="text-muted">{{ $cart->product->category->name }}</small>
                                                <div class="mt-1">
                                                    <span class="text-success fw-bold">
                                                        {{ $cart->product->formatted_price }}
                                                    </span>
                                                    <small class="text-muted">/ {{ $cart->product->unit }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Quantity Control -->
                                    <div class="col-md-3">
                                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="quantity-form">
                                            @csrf
                                            @method('PATCH')
                                            <div class="input-group input-group-sm">
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="decrementQty({{ $cart->id }})">
                                                    -
                                                </button>
                                                <input type="number"
                                                       id="qty-{{ $cart->id }}"
                                                       name="quantity"
                                                       class="form-control text-center"
                                                       value="{{ $cart->quantity }}"
                                                       min="1"
                                                       max="{{ $cart->product->stock }}"
                                                       onchange="this.form.submit()">
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="incrementQty({{ $cart->id }}, {{ $cart->product->stock }})">
                                                    +
                                                </button>
                                            </div>
                                        </form>
                                        <small class="text-muted d-block mt-1">
                                            Stok: {{ $cart->product->stock }} {{ $cart->product->unit }}
                                        </small>
                                    </div>

                                    <!-- Subtotal -->
                                    <div class="col-md-3 text-end">
                                        <div class="fw-bold text-success fs-5">
                                            Rp {{ number_format($cart->subtotal, 0, ',', '.') }}
                                        </div>
                                        <small class="text-muted">Subtotal</small>
                                    </div>

                                    <!-- Remove Button -->
                                    <div class="col-md-1 text-end">
                                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus {{ $cart->product->name }} dari keranjang?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash"></i> 🗑️
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">📊 Ringkasan Belanja</h5>
                    </div>
                    <div class="card-body">
                        <div class="summary-item d-flex justify-content-between mb-3">
                            <span>Total Item:</span>
                            <strong>{{ $carts->count() }} produk</strong>
                        </div>
                        <div class="summary-item d-flex justify-content-between mb-3">
                            <span>Total Quantity:</span>
                            <strong>{{ $carts->sum('quantity') }} {{ $carts->first()->product->unit ?? 'pcs' }}</strong>
                        </div>
                        <hr>
                        <div class="summary-total d-flex justify-content-between mb-4">
                            <h5 class="mb-0">Total Belanja:</h5>
                            <h4 class="mb-0 text-success fw-bold">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </h4>
                        </div>

                        <a href="{{ route('checkout.create') }}" class="btn btn-success btn-lg w-100 mb-3 checkout-btn">
                            💳 Lanjut ke Checkout
                        </a>
                        <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100">
                            ← Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <style>
        .cart-header {
            animation: fadeIn 0.5s ease;
        }

        .empty-cart {
            animation: fadeIn 0.8s ease;
        }

        .empty-icon {
            font-size: 5rem;
            animation: bounce 2s infinite;
        }

        .cart-item {
            transition: all 0.3s ease;
        }

        .cart-item:hover {
            background-color: #f8f9fa;
        }

        .product-icon {
            font-size: 3rem;
        }

        .quantity-form input[type="number"]::-webkit-inner-spin-button,
        .quantity-form input[type="number"]::-webkit-outer-spin-button {
            opacity: 1;
        }

        .checkout-btn {
            transition: all 0.3s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 80, 22, 0.3);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>

    <script>
        function incrementQty(cartId, maxStock) {
            const input = document.getElementById('qty-' + cartId);
            const currentValue = parseInt(input.value);
            if (currentValue < maxStock) {
                input.value = currentValue + 1;
                input.form.submit();
            } else {
                alert('Stok maksimal: ' + maxStock);
            }
        }

        function decrementQty(cartId) {
            const input = document.getElementById('qty-' + cartId);
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
                input.form.submit();
            }
        }
    </script>
</x-layout>
