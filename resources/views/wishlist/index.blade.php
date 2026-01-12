<x-layout>
    <x-slot:title>Wishlist - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #e91e63, #f06292);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(233, 30, 99, 0.3);
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

        /* ===== WISHLIST CARDS ===== */
        .wishlist-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .wishlist-card:nth-child(1) { animation-delay: 0.1s; }
        .wishlist-card:nth-child(2) { animation-delay: 0.15s; }
        .wishlist-card:nth-child(3) { animation-delay: 0.2s; }
        .wishlist-card:nth-child(4) { animation-delay: 0.25s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .wishlist-card:hover {
            border-color: #e91e63;
            box-shadow: 0 8px 25px rgba(233, 30, 99, 0.2);
            transform: translateY(-3px);
        }

        .wishlist-product-image {
            width: 120px;
            height: 120px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.5rem;
            transition: all 0.3s ease;
        }

        .wishlist-card:hover .wishlist-product-image {
            transform: scale(1.1) rotate(5deg);
        }

        .wishlist-product-info h5 {
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .wishlist-card:hover .wishlist-product-info h5 {
            color: #e91e63;
        }

        .wishlist-product-category {
            color: #6b8e23;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .wishlist-product-price {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .wishlist-product-stock {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        /* ===== ACTION BUTTONS ===== */
        .wishlist-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .btn-add-cart {
            flex: 1;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-add-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        .btn-view {
            flex: 1;
            background: white;
            color: #6b8e23;
            border: 2px solid #6b8e23;
        }

        .btn-view:hover {
            background: #6b8e23;
            color: white;
        }

        .btn-remove-wishlist {
            background: white;
            color: #e91e63;
            border: 2px solid #e91e63;
            padding: 0.7rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-remove-wishlist:hover {
            background: #e91e63;
            color: white;
            transform: translateY(-2px);
        }

        /* ===== SUMMARY CARD ===== */
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

        .summary-stat {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #e91e63, #f06292);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            color: #6c757d;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .btn-clear-wishlist {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
            padding: 0.75rem;
            border-radius: 12px;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-clear-wishlist:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-2px);
        }

        /* ===== EMPTY STATE ===== */
        .empty-wishlist {
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

            .wishlist-card {
                padding: 1rem;
            }

            .wishlist-product-image {
                width: 80px;
                height: 80px;
                font-size: 2.5rem;
            }

            .wishlist-actions {
                flex-direction: column;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-heart me-2"></i> Wishlist Saya
        </h1>
        <p class="mb-0 fs-5">Produk favorit yang Anda simpan</p>
    </div>

    @if($wishlists->isEmpty())
        <!-- ===== EMPTY WISHLIST ===== -->
        <div class="empty-wishlist">
            <div class="empty-icon">💔</div>
            <h2 class="empty-title">Wishlist Kosong</h2>
            <p class="text-muted fs-5 mb-4">Belum ada produk yang Anda simpan. Yuk mulai tambahkan produk favorit!</p>
            <a href="{{ route('products') }}" class="btn btn-add-cart btn-lg">
                <i class="fas fa-shopping-bag me-2"></i> Jelajahi Produk
            </a>
        </div>
    @else
        <div class="row">
            <!-- ===== WISHLIST ITEMS ===== -->
            <div class="col-lg-8">
                @foreach($wishlists as $wishlist)
                    <div class="wishlist-card">
                        <div class="row align-items-center">
                            <!-- Product Image -->
                            <div class="col-auto">
                                <div class="wishlist-product-image">
                                    {{ $wishlist->product->category->icon }}
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="col-md-5">
                                <div class="wishlist-product-info">
                                    <div class="wishlist-product-category">
                                        {{ $wishlist->product->category->name }}
                                    </div>
                                    <h5>{{ $wishlist->product->name }}</h5>
                                    <div class="wishlist-product-price">{{ $wishlist->product->formatted_price }}</div>
                                    <div class="wishlist-product-stock">
                                        <i class="fas fa-box me-1"></i>
                                        @if($wishlist->product->stock > 0)
                                            <span class="text-success">Stok: {{ $wishlist->product->stock }} {{ $wishlist->product->unit }}</span>
                                        @else
                                            <span class="text-danger">Stok Habis</span>
                                        @endif
                                    </div>
                                    <small class="text-muted">
                                        <i class="far fa-clock me-1"></i>
                                        Ditambahkan {{ $wishlist->created_at->diffForHumans() }}
                                    </small>
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="col-md-4 mt-3 mt-md-0">
                                <div class="wishlist-actions">
                                    @if($wishlist->product->stock > 0)
                                        <form action="{{ route('cart.add', $wishlist->product->id) }}" method="POST" class="flex-fill">
                                            @csrf
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn btn-add-cart w-100">
                                                <i class="fas fa-cart-plus me-2"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-add-cart w-100" disabled>
                                            <i class="fas fa-times-circle me-2"></i> Stok Habis
                                        </button>
                                    @endif

                                    <a href="{{ route('products.show', $wishlist->product->id) }}"
                                       class="btn btn-add-cart btn-view w-100">
                                        <i class="fas fa-eye me-2"></i> Lihat Detail
                                    </a>
                                </div>

                                <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-remove-wishlist w-100"
                                            onclick="return confirm('Hapus dari wishlist?')">
                                        <i class="fas fa-heart-broken me-2"></i> Hapus dari Wishlist
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- ===== SUMMARY SIDEBAR ===== -->
            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">
                        <i class="fas fa-heart"></i> Ringkasan Wishlist
                    </h3>

                    <div class="summary-stat">
                        <div class="stat-number">{{ $wishlists->count() }}</div>
                        <div class="stat-label">Produk Tersimpan</div>
                    </div>

                    <div class="summary-stat">
                        <div class="stat-number">{{ $wishlists->where('product.stock', '>', 0)->count() }}</div>
                        <div class="stat-label">Produk Tersedia</div>
                    </div>

                    <hr class="my-3">

                    <a href="{{ route('products') }}" class="btn btn-add-cart w-100 mb-2">
                        <i class="fas fa-shopping-bag me-2"></i> Lanjut Belanja
                    </a>

                    <form action="{{ route('wishlist.clear') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-clear-wishlist"
                                onclick="return confirm('Kosongkan semua wishlist?')">
                            <i class="fas fa-trash me-2"></i> Kosongkan Wishlist
                        </button>
                    </form>

                    <div class="alert alert-info mt-3 mb-0">
                        <small>
                            <i class="fas fa-info-circle me-2"></i>
                            Produk di wishlist tidak akan hilang dan bisa Anda akses kapan saja!
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-layout>
