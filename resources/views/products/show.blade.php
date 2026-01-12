<x-layout>
    <x-slot:title>{{ $product->name }} - Protani Indonesia</x-slot:title>

    <style>
        /* ===== BREADCRUMB ===== */
        .breadcrumb-custom {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            animation: fadeInDown 0.5s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .breadcrumb {
            margin-bottom: 0;
        }

        .breadcrumb-item a {
            color: #6b8e23;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #2d5016;
        }

        /* ===== PRODUCT DETAIL SECTION ===== */
        .product-detail {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
            margin-bottom: 2rem;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== PRODUCT IMAGE ===== */
        .product-image-section {
            position: relative;
            animation: fadeInLeft 0.6s ease;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .product-image-main {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .product-image-main:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 40px rgba(0,0,0,0.15);
        }

        .product-image-placeholder {
            font-size: 10rem;
            opacity: 0.3;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .product-badge-detail {
            position: absolute;
            top: 20px;
            right: 20px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 15px;
            font-size: 1.5rem;
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.4);
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* ===== RATING DISPLAY ===== */
        .rating-summary {
            background: linear-gradient(135deg, #fff3cd, #ffe8a1);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .rating-number {
            font-size: 2.5rem;
            font-weight: 900;
            color: #ffc107;
        }

        .rating-stars-large {
            font-size: 1.5rem;
        }

        .rating-count {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* ===== PRODUCT INFO ===== */
        .product-info-section {
            animation: fadeInRight 0.6s ease;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .product-category-badge {
            display: inline-block;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 600;
            margin-bottom: 1rem;
            animation: slideInRight 0.6s ease;
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(50px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .product-name {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .product-price-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 15px;
            margin: 1.5rem 0;
            border-left: 5px solid #6b8e23;
        }

        .product-price-large {
            font-size: 3rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .product-unit-info {
            font-size: 1.1rem;
            color: #6c757d;
            font-weight: 600;
        }

        /* ===== PRODUCT DETAILS ===== */
        .product-details-list {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        .product-details-list li {
            padding: 1rem;
            margin-bottom: 0.5rem;
            background: #f8f9fa;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.3s ease;
        }

        .product-details-list li:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .product-details-list li i {
            font-size: 1.5rem;
            color: #6b8e23;
            width: 30px;
            text-align: center;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            min-width: 100px;
        }

        .detail-value {
            color: #2d5016;
            font-weight: 700;
        }

        /* ===== DESCRIPTION ===== */
        .product-description-section {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 15px;
            margin: 1.5rem 0;
        }

        .description-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .product-description-text {
            color: #495057;
            line-height: 1.8;
            font-size: 1.05rem;
        }

        /* ===== ADD TO CART FORM ===== */
        .cart-form-section {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            border: 3px dashed #e9ecef;
            margin-top: 2rem;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .quantity-label {
            font-weight: 700;
            color: #2d5016;
            font-size: 1.1rem;
        }

        .quantity-input-group {
            display: flex;
            align-items: center;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            overflow: hidden;
        }

        .quantity-btn {
            background: #f8f9fa;
            border: none;
            padding: 0.75rem 1.25rem;
            font-size: 1.5rem;
            color: #2d5016;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 700;
        }

        .quantity-btn:hover {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
        }

        .quantity-input {
            border: none;
            width: 80px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d5016;
            padding: 0.75rem 0.5rem;
        }

        .quantity-input:focus {
            outline: none;
        }

        .btn-add-cart {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-add-cart::before {
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

        .btn-add-cart:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-add-cart:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(45, 80, 22, 0.4);
        }

        .btn-add-cart:disabled {
            background: #6c757d;
            cursor: not-allowed;
            transform: none;
        }

        .btn-add-cart:disabled:hover {
            box-shadow: none;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .btn-action {
            flex: 1;
            padding: 0.75rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit {
            background: white;
            color: #6b8e23;
            border: 2px solid #6b8e23;
        }

        .btn-edit:hover {
            background: #6b8e23;
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
        }

        .btn-delete:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-2px);
        }

        /* ===== STOCK WARNING ===== */
        .stock-warning {
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            padding: 1rem;
            border-radius: 10px;
            margin-top: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .stock-warning.danger {
            background: #f8d7da;
            border-left-color: #dc3545;
        }

        /* ===== REVIEWS SECTION ===== */
        .reviews-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            animation: fadeInUp 0.8s ease;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ===== REVIEW FORM ===== */
        .review-form-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem;
            border-radius: 16px;
            margin-bottom: 2rem;
        }

        .star-rating {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .star-rating input[type="radio"] {
            display: none;
        }

        .star-rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #ffc107;
            transform: scale(1.2);
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        .btn-submit-review {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-submit-review:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        /* ===== REVIEW CARDS ===== */
        .review-card {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .review-card:hover {
            background: #e9ecef;
            border-color: #6b8e23;
            transform: translateX(5px);
        }

        .review-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .reviewer-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .reviewer-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .reviewer-name {
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.25rem;
        }

        .review-date {
            color: #6c757d;
            font-size: 0.85rem;
        }

        .review-rating {
            font-size: 1.2rem;
        }

        .review-comment {
            color: #495057;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        .review-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-review-action {
            padding: 0.4rem 1rem;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-edit-review {
            background: white;
            color: #6b8e23;
            border: 2px solid #6b8e23;
        }

        .btn-edit-review:hover {
            background: #6b8e23;
            color: white;
        }

        .btn-delete-review {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
        }

        .btn-delete-review:hover {
            background: #dc3545;
            color: white;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .product-name {
                font-size: 2rem;
            }

            .product-price-large {
                font-size: 2.5rem;
            }

            .product-image-main {
                height: 300px;
            }

            .quantity-selector {
                flex-direction: column;
                align-items: flex-start;
            }

            .section-title {
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- ===== BREADCRUMB ===== -->
    <nav class="breadcrumb-custom">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
            <li class="breadcrumb-item"><a href="{{ route('products') }}?category={{ $product->category->id }}">{{ $product->category->name }}</a></li>
            <li class="breadcrumb-item active">{{ $product->name }}</li>
        </ol>
    </nav>

    <!-- ===== PRODUCT DETAIL ===== -->
    <div class="product-detail">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="product-image-section">
                    <div class="product-image-main">
                        <div class="product-image-placeholder">{{ $product->category->icon }}</div>
                        <span class="product-badge-detail">{{ $product->category->icon }}</span>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-7">
                <div class="product-info-section">
                    <span class="product-category-badge">
                        <i class="fas fa-tag me-2"></i>{{ $product->category->name }}
                    </span>

                    <h1 class="product-name">{{ $product->name }}</h1>

                    <!-- Rating Summary -->
                    @if($product->total_reviews > 0)
                        <div class="rating-summary">
                            <div class="rating-number">{{ number_format($product->average_rating, 1) }}</div>
                            <div>
                                <div class="rating-stars-large">{!! $product->rating_stars !!}</div>
                                <div class="rating-count">{{ $product->total_reviews }} review{{ $product->total_reviews > 1 ? 's' : '' }}</div>
                            </div>
                        </div>
                    @endif

                    <!-- Price Section -->
                    <div class="product-price-section">
                        <div class="product-price-large">{{ $product->formatted_price }}</div>
                        <div class="product-unit-info">per {{ $product->unit }}</div>
                    </div>

                    <!-- Product Details -->
                    <ul class="product-details-list">
                        <li>
                            <i class="fas fa-boxes"></i>
                            <span class="detail-label">Stok Tersedia:</span>
                            <span class="detail-value {{ $product->stock > 10 ? 'text-success' : ($product->stock > 0 ? 'text-warning' : 'text-danger') }}">
                                {{ $product->stock }} {{ $product->unit }}
                            </span>
                        </li>
                        @if($product->origin)
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <span class="detail-label">Asal Daerah:</span>
                                <span class="detail-value">{{ $product->origin }}</span>
                            </li>
                        @endif
                        <li>
                            <i class="fas fa-weight"></i>
                            <span class="detail-label">Satuan:</span>
                            <span class="detail-value">{{ $product->unit }}</span>
                        </li>
                    </ul>

                    <!-- Description -->
                    <div class="product-description-section">
                        <h5 class="description-title">
                            <i class="fas fa-info-circle"></i> Deskripsi Produk
                        </h5>
                        <p class="product-description-text">{{ $product->description }}</p>
                    </div>

                    <!-- Add to Cart Form -->
                    @auth
                        <!-- Wishlist Button -->
                        <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="mb-3">
                            @csrf
                            <button type="submit" class="btn w-100" style="background: white; color: #e91e63; border: 2px solid #e91e63; padding: 0.75rem; border-radius: 12px; font-weight: 600; transition: all 0.3s ease;">
                                <i class="{{ $product->isInWishlist() ? 'fas' : 'far' }} fa-heart me-2"></i>
                                {{ $product->isInWishlist() ? 'Hapus dari Wishlist' : 'Tambah ke Wishlist' }}
                            </button>
                        </form>

                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="cart-form-section">
                            @csrf
                            <div class="quantity-selector">
                                <label class="quantity-label">
                                    <i class="fas fa-shopping-cart me-2"></i>Jumlah:
                                </label>
                                <div class="quantity-input-group">
                                    <button type="button" class="quantity-btn" onclick="decrementQuantity()">−</button>
                                    <input type="number" name="quantity" id="quantity" class="quantity-input"
                                           value="1" min="1" max="{{ $product->stock }}" required>
                                    <button type="button" class="quantity-btn" onclick="incrementQuantity()">+</button>
                                </div>
                            </div>

                            @if($product->stock > 0)
                                <button type="submit" class="btn btn-add-cart">
                                    <i class="fas fa-cart-plus me-2"></i> Tambahkan ke Keranjang
                                </button>

                                @if($product->stock <= 10)
                                    <div class="stock-warning {{ $product->stock <= 5 ? 'danger' : '' }}">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <strong>Stok Terbatas!</strong> Tersisa {{ $product->stock }} {{ $product->unit }} saja
                                    </div>
                                @endif
                            @else
                                <button type="button" class="btn btn-add-cart" disabled>
                                    <i class="fas fa-times-circle me-2"></i> Stok Habis
                                </button>
                            @endif
                        </form>
                    @else
                        <div class="cart-form-section text-center">
                            <p class="text-muted mb-3">
                                <i class="fas fa-info-circle me-2"></i>Silakan login untuk menambahkan produk ke keranjang
                            </p>
                            <a href="{{ route('login') }}" class="btn btn-add-cart">
                                <i class="fas fa-sign-in-alt me-2"></i> Login untuk Membeli
                            </a>
                        </div>
                    @endauth

                    <!-- Action Buttons for Edit/Delete -->
                    @auth
                        <div class="action-buttons">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-action btn-edit">
                                <i class="fas fa-edit me-2"></i> Edit Produk
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')" class="flex-fill">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-action btn-delete w-100">
                                    <i class="fas fa-trash me-2"></i> Hapus Produk
                                </button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <!-- ===== REVIEWS SECTION ===== -->
    <div class="reviews-section">
        <h2 class="section-title">
            <i class="fas fa-star me-2"></i> Review & Rating
        </h2>

        @auth
            @php
                $userReview = $product->reviews()->where('user_id', Auth::id())->first();
            @endphp

            @if(!$userReview)
                <!-- Add Review Form -->
                <div class="review-form-card">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-pencil-alt me-2"></i>Tulis Review Anda
                    </h5>
                    <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                        @csrf

                        <!-- Star Rating -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Rating <span class="text-danger">*</span></label>
                            <div class="star-rating">
                                <input type="radio" name="rating" value="5" id="star5" required>
                                <label for="star5"><i class="fas fa-star"></i></label>

                                <input type="radio" name="rating" value="4" id="star4">
                                <label for="star4"><i class="fas fa-star"></i></label>

                                <input type="radio" name="rating" value="3" id="star3">
                                <label for="star3"><i class="fas fa-star"></i></label>

                                <input type="radio" name="rating" value="2" id="star2">
                                <label for="star2"><i class="fas fa-star"></i></label>

                                <input type="radio" name="rating" value="1" id="star1">
                                <label for="star1"><i class="fas fa-star"></i></label>
                            </div>
                            @error('rating')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Comment -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Komentar (Opsional)</label>
                            <textarea name="comment" class="form-control" rows="4"
                                      placeholder="Ceritakan pengalaman Anda dengan produk ini...">{{ old('comment') }}</textarea>
                            @error('comment')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-submit-review">
                            <i class="fas fa-paper-plane me-2"></i> Kirim Review
                        </button>
                    </form>
                </div>
            @else
                <!-- User's Existing Review -->
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Anda sudah memberikan review untuk produk ini. Lihat review Anda di bawah.
                </div>
            @endif
        @else
            <div class="alert alert-warning">
                <i class="fas fa-sign-in-alt me-2"></i>
                <a href="{{ route('login') }}" class="alert-link">Login</a> untuk memberikan review pada produk ini.
            </div>
        @endauth

        <!-- Reviews List -->
        @if($product->reviews->count() > 0)
            <h4 class="fw-bold mt-4 mb-3">
                <i class="fas fa-comments me-2"></i>
                Semua Review ({{ $product->reviews->count() }})
            </h4>

            @foreach($product->reviews()->latest()->get() as $review)
                <div class="review-card">
                    <div class="review-header">
                        <div class="reviewer-info">
                            <div class="reviewer-avatar">
                                {{ strtoupper(substr($review->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <div class="reviewer-name">{{ $review->user->name }}</div>
                                <div class="review-date">
                                    <i class="far fa-calendar me-1"></i>
                                    {{ $review->created_at->format('d M Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="review-rating">{!! $review->stars_html !!}</div>
                    </div>

                    @if($review->comment)
                        <p class="review-comment">{{ $review->comment }}</p>
                    @endif

                    <!-- Edit/Delete for own review -->
                    @auth
                        @if($review->user_id === Auth::id())
                            <div class="review-actions">
                                <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus review ini?')" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-review-action btn-delete-review">
                                        <i class="fas fa-trash me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        @else
            <div class="text-center py-5">
                <div style="font-size: 4rem; opacity: 0.3;">⭐</div>
                <h5 class="text-muted">Belum Ada Review</h5>
                <p class="text-muted">Jadilah yang pertama memberikan review untuk produk ini!</p>
            </div>
        @endif
    </div>

    <!-- ===== SIMILAR PRODUCTS SECTION ===== -->
    @if($similarProducts->count() > 0)
        <div class="reviews-section mt-4">
            <h2 class="section-title">
                <i class="fas fa-th-large me-2"></i> Produk Serupa
            </h2>

            <div class="row g-4">
                @foreach($similarProducts as $similar)
                    <div class="col-md-3 col-sm-6">
                        <div class="card product-card h-100" style="animation: fadeInUp 0.6s ease;">
                            <div class="card-body position-relative">
                                <span class="product-badge">{{ $similar->category->icon }}</span>

                                <h5 class="product-title mt-3">{{ $similar->name }}</h5>
                                <p class="text-muted small fw-semibold mb-2">
                                    {{ $similar->category->name }}
                                </p>

                                <div class="mb-3">
                                    <div class="product-price" style="font-size: 1.5rem;">{{ $similar->formatted_price }}</div>
                                    <small class="text-muted">per {{ $similar->unit }}</small>
                                </div>

                                <a href="{{ route('products.show', $similar->id) }}" class="btn product-btn w-100">
                                    <i class="fas fa-eye me-2"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <script>
        const maxStock = {{ $product->stock }};

        function incrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue < maxStock) {
                input.value = currentValue + 1;
            }
        }

        function decrementQuantity() {
            const input = document.getElementById('quantity');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        }

        // Prevent manual input beyond max stock
        document.getElementById('quantity').addEventListener('input', function() {
            if (parseInt(this.value) > maxStock) {
                this.value = maxStock;
            }
            if (parseInt(this.value) < 1) {
                this.value = 1;
            }
        });
    </script>

</x-layout>
