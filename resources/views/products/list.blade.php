<x-layout>
    <x-slot:title>Produk - Protani Indonesia</x-slot:title>

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
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        /* ===== FILTER SIDEBAR ===== */
        .filter-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            position: sticky;
            top: 90px;
            animation: fadeInLeft 0.6s ease;
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .filter-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-section {
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #e9ecef;
        }

        .filter-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .filter-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .filter-input {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.6rem 1rem;
            transition: all 0.3s ease;
        }

        .filter-input:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        .category-option {
            padding: 0.6rem 1rem;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #e9ecef;
        }

        .category-option:hover {
            background-color: #f8f9fa;
            border-color: #6b8e23;
            transform: translateX(5px);
        }

        .category-option.active {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border-color: #2d5016;
        }

        .filter-btn {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        .reset-btn {
            background: white;
            color: #6c757d;
            border: 2px solid #e9ecef;
        }

        .reset-btn:hover {
            background: #f8f9fa;
            border-color: #dc3545;
            color: #dc3545;
        }

        /* ===== PRODUCT GRID ===== */
        .products-container {
            animation: fadeInRight 0.6s ease;
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .sort-bar {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .products-count {
            font-weight: 600;
            color: #495057;
        }

        .sort-select {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 0.5rem 1rem;
            min-width: 200px;
            transition: all 0.3s ease;
        }

        .sort-select:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        /* ===== PRODUCT CARDS ===== */
        .product-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 2px solid transparent;
            height: 100%;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.15s; }
        .product-card:nth-child(3) { animation-delay: 0.2s; }
        .product-card:nth-child(4) { animation-delay: 0.25s; }
        .product-card:nth-child(5) { animation-delay: 0.3s; }
        .product-card:nth-child(6) { animation-delay: 0.35s; }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.2);
            border-color: #6b8e23;
        }

        .product-image-wrapper {
            position: relative;
            height: 200px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .wishlist-btn {
            position: absolute;
            top: 15px;
            left: 15px;
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 2;
        }

        .wishlist-btn:hover {
            transform: scale(1.1);
            border-color: #e91e63;
        }

        .wishlist-btn i {
            font-size: 1.2rem;
            color: #6c757d;
            transition: all 0.3s ease;
        }

        .wishlist-btn.in-wishlist i {
            color: #e91e63;
        }

        .wishlist-btn:hover i {
            color: #e91e63;
        }

        .product-image-placeholder {
            font-size: 5rem;
            opacity: 0.3;
            transition: all 0.3s ease;
        }

        .product-card:hover .product-image-placeholder {
            transform: scale(1.2) rotate(5deg);
            opacity: 0.5;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 12px;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(45, 80, 22, 0.3);
            transition: all 0.3s ease;
        }

        .product-card:hover .product-badge {
            transform: scale(1.1) rotate(-5deg);
        }

        .stock-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: rgba(255, 255, 255, 0.95);
            padding: 0.4rem 0.8rem;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .stock-badge.in-stock {
            color: #28a745;
        }

        .stock-badge.low-stock {
            color: #ffc107;
        }

        .stock-badge.out-of-stock {
            color: #dc3545;
        }

        .product-body {
            padding: 1.5rem;
        }

        .product-category {
            color: #6b8e23;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .product-card:hover .product-title {
            color: #6b8e23;
        }

        .product-description {
            color: #6c757d;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .product-info {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 1rem;
        }

        .product-price {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-unit {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .product-origin {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .product-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-detail {
            flex: 1;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.7rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        /* ===== PAGINATION ===== */
        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }

        .page-link {
            border: 2px solid #e9ecef;
            color: #2d5016;
            padding: 0.6rem 1rem;
            margin: 0 0.25rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .page-link:hover {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border-color: #2d5016;
            transform: translateY(-2px);
        }

        .page-item.active .page-link {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            border-color: #2d5016;
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 16px;
            animation: fadeInUp 0.6s ease;
        }

        .empty-icon {
            font-size: 5rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .filter-card {
                position: static;
                margin-bottom: 2rem;
            }

            .page-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .sort-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .sort-select {
                width: 100%;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-shopping-bag me-2"></i> Semua Produk
        </h1>
        <p class="mb-0 fs-5">Temukan produk pertanian berkualitas dari petani lokal Indonesia</p>
    </div>

    <!-- ===== RECOMMENDATIONS BANNER ===== -->
    @if($recommendations->count() > 0)
        <div class="alert alert-success mb-4" style="border-radius: 16px; border: none; background: linear-gradient(135deg, #d4edda, #c3e6cb); animation: fadeInDown 0.6s ease;">
            <h5 class="alert-heading fw-bold mb-3">
                <i class="fas fa-robot me-2"></i> 🤖 Rekomendasi untuk Anda
            </h5>
            <div class="row g-3">
                @foreach($recommendations->take(3) as $rec)
                    <div class="col-md-4">
                        <div class="card h-100" style="border-radius: 12px; border: 2px solid #6b8e23; background: white;">
                            <div class="card-body p-3">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <div style="font-size: 2rem;">{{ $rec->category->icon }}</div>
                                    <div class="flex-fill">
                                        <h6 class="mb-0 fw-bold" style="font-size: 0.95rem;">{{ Str::limit($rec->name, 30) }}</h6>
                                        <small class="text-muted">{{ $rec->category->name }}</small>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold text-success">{{ $rec->formatted_price }}</span>
                                    <a href="{{ route('products.show', $rec->id) }}" class="btn btn-sm btn-success">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <div class="row">
        <!-- ===== FILTER SIDEBAR ===== -->
        <div class="col-lg-3">
            <div class="filter-card">
                <h5 class="filter-title">
                    <i class="fas fa-filter"></i> Filter Produk
                </h5>

                <form action="{{ route('products') }}" method="GET">
                    <!-- Search -->
                    <div class="filter-section">
                        <label class="filter-label">
                            <i class="fas fa-search"></i> Cari Produk
                        </label>
                        <input type="text" name="search" class="form-control filter-input"
                               placeholder="Nama produk..." value="{{ request('search') }}">
                    </div>

                    <!-- Category -->
                    <div class="filter-section">
                        <label class="filter-label">
                            <i class="fas fa-th-large"></i> Kategori
                        </label>
                        <div class="category-option {{ !request('category') ? 'active' : '' }}">
                            <input type="radio" name="category" value="" id="cat-all"
                                   {{ !request('category') ? 'checked' : '' }} class="d-none">
                            <label for="cat-all" class="w-100 mb-0 cursor-pointer">
                                Semua Kategori
                            </label>
                        </div>
                        @foreach($categories as $cat)
                            <div class="category-option {{ request('category') == $cat->id ? 'active' : '' }}">
                                <input type="radio" name="category" value="{{ $cat->id }}"
                                       id="cat-{{ $cat->id }}"
                                       {{ request('category') == $cat->id ? 'checked' : '' }}
                                       class="d-none">
                                <label for="cat-{{ $cat->id }}" class="w-100 mb-0 cursor-pointer">
                                    {{ $cat->icon }} {{ $cat->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Price Range -->
                    <div class="filter-section">
                        <label class="filter-label">
                            <i class="fas fa-tag"></i> Rentang Harga
                        </label>
                        <div class="row g-2">
                            <div class="col-6">
                                <input type="number" name="min_price" class="form-control filter-input"
                                       placeholder="Min" value="{{ request('min_price') }}">
                            </div>
                            <div class="col-6">
                                <input type="number" name="max_price" class="form-control filter-input"
                                       placeholder="Max" value="{{ request('max_price') }}">
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn filter-btn">
                            <i class="fas fa-check me-2"></i> Terapkan Filter
                        </button>
                        <a href="{{ route('products') }}" class="btn reset-btn">
                            <i class="fas fa-redo me-2"></i> Reset Filter
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- ===== PRODUCTS GRID ===== -->
        <div class="col-lg-9">
            <div class="products-container">
                <!-- Sort Bar -->
                <div class="sort-bar">
                    <div class="products-count">
                        <i class="fas fa-box me-2"></i>
                        <strong>{{ $products->total() }}</strong> produk ditemukan
                    </div>
                    <form action="{{ route('products') }}" method="GET" class="d-flex gap-2 align-items-center">
                        <!-- Preserve filters -->
                        <input type="hidden" name="search" value="{{ request('search') }}">
                        <input type="hidden" name="category" value="{{ request('category') }}">
                        <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                        <input type="hidden" name="max_price" value="{{ request('max_price') }}">

                        <label class="mb-0 text-muted">Urutkan:</label>
                        <select name="sort_by" class="form-select sort-select" onchange="this.form.submit()">
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama A-Z</option>
                            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Harga Termurah</option>
                        </select>
                    </form>
                </div>

                <!-- Products Grid -->
                @if($products->count() > 0)
                    <div class="row g-4">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="card product-card">
                                    <div class="product-image-wrapper">
                                        <div class="product-image-placeholder">
                                            {{ $product->category->icon }}
                                        </div>

                                        @auth
                                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="wishlist-btn {{ $product->isInWishlist() ? 'in-wishlist' : '' }}">
                                                @csrf
                                                <button type="submit" style="background: none; border: none; cursor: pointer;">
                                                    <i class="{{ $product->isInWishlist() ? 'fas' : 'far' }} fa-heart"></i>
                                                </button>
                                            </form>
                                        @endauth

                                        <span class="product-badge">{{ $product->category->icon }}</span>
                                        <span class="stock-badge {{ $product->stock > 10 ? 'in-stock' : ($product->stock > 0 ? 'low-stock' : 'out-of-stock') }}">
                                            <i class="fas fa-box me-1"></i>
                                            {{ $product->stock > 0 ? 'Stok: ' . $product->stock : 'Habis' }}
                                        </span>
                                    </div>
                                    <div class="product-body">
                                        <div class="product-category">{{ $product->category->name }}</div>
                                        <h5 class="product-title">{{ $product->name }}</h5>
                                        <p class="product-description">{{ Str::limit($product->description, 70) }}</p>

                                        <div class="product-info">
                                            <div>
                                                <div class="product-price">{{ $product->formatted_price }}</div>
                                                <div class="product-unit">per {{ $product->unit }}</div>
                                            </div>
                                            @if($product->origin)
                                                <div class="product-origin">
                                                    <i class="fas fa-map-marker-alt"></i> {{ $product->origin }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="product-actions">
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-detail">
                                                <i class="fas fa-eye me-2"></i> Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links() }}
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="empty-state">
                        <div class="empty-icon">📦</div>
                        <h3 class="text-muted mb-3">Produk Tidak Ditemukan</h3>
                        <p class="text-muted mb-4">Coba ubah filter atau kata kunci pencarian Anda</p>
                        <a href="{{ route('products') }}" class="btn btn-success btn-lg">
                            <i class="fas fa-redo me-2"></i> Reset Pencarian
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-layout>
