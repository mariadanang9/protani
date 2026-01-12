<x-layout>
    <x-slot:title>Keranjang Belanja - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        /* ===== CART ITEMS ===== */
        .cart-section {
            animation: fadeInLeft 0.6s ease;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .cart-item-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .cart-item-card:nth-child(1) { animation-delay: 0.1s; }
        .cart-item-card:nth-child(2) { animation-delay: 0.15s; }
        .cart-item-card:nth-child(3) { animation-delay: 0.2s; }
        .cart-item-card:nth-child(4) { animation-delay: 0.25s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .cart-item-card:hover {
            border-color: #6b8e23;
            box-shadow: 0 8px 25px rgba(45, 80, 22, 0.15);
            transform: translateY(-3px);
        }

        .cart-product-image {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            transition: all 0.3s ease;
        }

        .cart-item-card:hover .cart-product-image {
            transform: scale(1.1) rotate(5deg);
        }

        .cart-product-info h5 {
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .cart-item-card:hover .cart-product-info h5 {
            color: #6b8e23;
        }

        .cart-product-category {
            color: #6b8e23;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .cart-product-price {
            color: #6c757d;
            font-size: 1.1rem;
            font-weight: 600;
        }

        /* ===== QUANTITY CONTROLS ===== */
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .quantity-form {
            display: flex;
            align-items: center;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            overflow: hidden;
            background: #f8f9fa;
        }

        .quantity-btn {
            background: white;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1.2rem;
            color: #2d5016;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 700;
        }

        .quantity-btn:hover {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
        }

        .quantity-display {
            padding: 0.5rem 1rem;
            font-weight: 700;
            color: #2d5016;
            min-width: 50px;
            text-align: center;
            background: white;
        }

        /* ===== SUBTOTAL & ACTIONS ===== */
        .cart-item-subtotal {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-remove {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-remove:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        /* ===== SUMMARY SIDEBAR ===== */
        .summary-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: sticky;
            top: 90px;
            animation: fadeInRight 0.6s ease;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .summary-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-label {
            color: #6c757d;
            font-weight: 600;
        }

        .summary-value {
            color: #2d5016;
            font-weight: 700;
        }

        .summary-total {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 12px;
            margin: 1rem 0;
        }

        .summary-total .summary-label {
            font-size: 1.2rem;
            color: #2d5016;
        }

        .summary-total .summary-value {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-checkout {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-checkout::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-checkout:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-checkout:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(45, 80, 22, 0.4);
        }

        .btn-continue {
            background: white;
            color: #6b8e23;
            border: 2px solid #6b8e23;
            margin-top: 0.5rem;
        }

        .btn-continue:hover {
            background: #6b8e23;
            color: white;
        }

        .btn-clear {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
            margin-top: 0.5rem;
        }

        .btn-clear:hover {
            background: #dc3545;
            color: white;
        }

        /* ===== EMPTY CART ===== */
        .empty-cart {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
        }

        .empty-icon {
            font-size: 6rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .empty-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        .empty-text {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .summary-card {
                position: static;
                margin-top: 2rem;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .cart-item-card {
                padding: 1rem;
            }

            .cart-product-image {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }

            .cart-item-subtotal {
                font-size: 1.2rem;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-shopping-cart me-2"></i> Keranjang Belanja
        </h1>
        <p class="mb-0 fs-5">Kelola produk yang akan Anda beli</p>
    </div>

    @if($carts->isEmpty())
        <!-- ===== EMPTY CART ===== -->
        <div class="empty-cart">
            <div class="empty-icon">🛒</div>
            <h2 class="empty-title">Keranjang Belanja Kosong</h2>
            <p class="empty-text">Belum ada produk di keranjang Anda. Yuk mulai berbelanja!</p>
            <a href="{{ route('products') }}" class="btn btn-checkout btn-lg">
                <i class="fas fa-shopping-bag me-2"></i> Mulai Belanja
            </a>
        </div>
    @else
        <div class="row">
            <!-- ===== CART ITEMS ===== -->
            <div class="col-lg-8">
                <div class="cart-section">
                    @foreach($carts as $cart)
                        <div class="cart-item-card">
                            <div class="row align-items-center">
                                <!-- Product Image -->
                                <div class="col-auto">
                                    <div class="cart-product-image">
                                        {{ $cart->product->category->icon }}
                                    </div>
                                </div>

                                <!-- Product Info -->
                                <div class="col-md-4">
                                    <div class="cart-product-info">
                                        <div class="cart-product-category">
                                            {{ $cart->product->category->name }}
                                        </div>
                                        <h5>{{ $cart->product->name }}</h5>
                                        <div class="cart-product-price">
                                            {{ $cart->product->formatted_price }} / {{ $cart->product->unit }}
                                        </div>
                                    </div>
                                </div>

                                <!-- Quantity Controls -->
                                <div class="col-md-3 mt-3 mt-md-0">
                                    <div class="quantity-controls">
                                        <form action="{{ route('cart.update', $cart->id) }}" method="POST" class="quantity-form">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" name="quantity" value="{{ $cart->quantity - 1 }}"
                                                    class="quantity-btn" {{ $cart->quantity <= 1 ? 'disabled' : '' }}>
                                                −
                                            </button>
                                            <span class="quantity-display">{{ $cart->quantity }}</span>
                                            <button type="submit" name="quantity" value="{{ $cart->quantity + 1 }}"
                                                    class="quantity-btn" {{ $cart->quantity >= $cart->product->stock ? 'disabled' : '' }}>
                                                +
                                            </button>
                                        </form>
                                    </div>
                                    <small class="text-muted d-block mt-1">
                                        <i class="fas fa-box me-1"></i>Stok: {{ $cart->product->stock }}
                                    </small>
                                </div>

                                <!-- Subtotal & Remove -->
                                <div class="col-md-3 mt-3 mt-md-0">
                                    <div class="text-md-end">
                                        <div class="cart-item-subtotal mb-2">
                                            Rp {{ number_format($cart->subtotal, 0, ',', '.') }}
                                        </div>
                                        <form action="{{ route('cart.remove', $cart->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-remove btn-sm"
                                                    onclick="return confirm('Hapus produk dari keranjang?')">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- ===== SUMMARY SIDEBAR ===== -->
            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">
                        <i class="fas fa-receipt"></i> Ringkasan Belanja
                    </h3>

                    <div class="summary-row">
                        <span class="summary-label">
                            <i class="fas fa-shopping-bag me-2"></i>Total Produk
                        </span>
                        <span class="summary-value">{{ $carts->count() }} item</span>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            <i class="fas fa-boxes me-2"></i>Total Barang
                        </span>
                        <span class="summary-value">{{ $carts->sum('quantity') }} unit</span>
                    </div>

                    <div class="summary-total">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="summary-label">Total Harga</span>
                            <span class="summary-value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <a href="{{ route('checkout.create') }}" class="btn btn-checkout">
                        <i class="fas fa-credit-card me-2"></i> Lanjut ke Pembayaran
                    </a>

                    <a href="{{ route('products') }}" class="btn btn-checkout btn-continue">
                        <i class="fas fa-arrow-left me-2"></i> Lanjut Belanja
                    </a>

                    <form action="{{ route('cart.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-checkout btn-clear"
                                onclick="return confirm('Hapus semua produk dari keranjang?')">
                            <i class="fas fa-trash me-2"></i> Kosongkan Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif

</x-layout>
