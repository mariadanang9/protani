<x-layout>
    <x-slot:title>Home - Protani Indonesia</x-slot:title>

    <style>
        /* ===== HERO SECTION ===== */
        .hero-section {
            background: linear-gradient(135deg, #1a3010 0%, #2d5016 50%, #6b8e23 100%);
            border-radius: 24px;
            padding: 4rem 2rem;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(45, 80, 22, 0.3);
            animation: fadeInUp 0.8s ease;
        }

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

        /* Animated background circles */
        .hero-section::before,
        .hero-section::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.05);
            animation: float 20s infinite ease-in-out;
        }

        .hero-section::before {
            width: 400px;
            height: 400px;
            top: -100px;
            right: -100px;
            animation-delay: 0s;
        }

        .hero-section::after {
            width: 300px;
            height: 300px;
            bottom: -80px;
            left: -80px;
            animation-delay: 2s;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -30px) rotate(120deg); }
            66% { transform: translate(-20px, 20px) rotate(240deg); }
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-logo {
            animation: bounceIn 1s ease;
        }

        @keyframes bounceIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); opacity: 1; }
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            text-shadow: 2px 4px 8px rgba(0,0,0,0.2);
            animation: slideInLeft 0.8s ease 0.2s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .hero-subtitle {
            font-size: 1.5rem;
            animation: slideInLeft 0.8s ease 0.4s both;
        }

        .hero-description {
            font-size: 1.1rem;
            animation: slideInLeft 0.8s ease 0.6s both;
        }

        .hero-buttons {
            animation: slideInLeft 0.8s ease 0.8s both;
        }

        .hero-btn {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .hero-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .hero-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* ===== STATS CARDS ===== */
        .stats-section {
            margin-bottom: 4rem;
        }

        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            border: none;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease;
            animation-fill-mode: both;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #2d5016, #6b8e23);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .stat-card:hover::before {
            transform: scaleX(1);
        }

        .stat-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.2);
        }

        .stat-icon {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.2) rotateY(360deg);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        /* ===== SECTION HEADERS ===== */
        .section-header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInUp 0.8s ease;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 0.5rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #2d5016, #6b8e23);
            border-radius: 2px;
        }

        /* ===== CATEGORY CARDS ===== */
        .category-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            text-align: center;
            border: none;
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease;
            animation-fill-mode: both;
        }

        .category-card:nth-child(1) { animation-delay: 0.1s; }
        .category-card:nth-child(2) { animation-delay: 0.2s; }
        .category-card:nth-child(3) { animation-delay: 0.3s; }
        .category-card:nth-child(4) { animation-delay: 0.4s; }

        .category-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(45, 80, 22, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .category-card:hover::before {
            left: 100%;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(45, 80, 22, 0.15);
        }

        .category-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .category-badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .category-card:hover .category-badge {
            transform: scale(1.1);
        }

        /* ===== PRODUCT CARDS ===== */
        .product-card {
            background: white;
            border-radius: 20px;
            border: none;
            overflow: hidden;
            transition: all 0.4s ease;
            animation: fadeInUp 0.8s ease;
            animation-fill-mode: both;
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }
        .product-card:nth-child(5) { animation-delay: 0.5s; }
        .product-card:nth-child(6) { animation-delay: 0.6s; }

        .product-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 20px 40px rgba(45, 80, 22, 0.2);
        }

        .product-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 15px;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(45, 80, 22, 0.3);
            transition: all 0.3s ease;
        }

        .product-card:hover .product-badge {
            transform: scale(1.1) rotate(-5deg);
        }

        .product-title {
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.5rem;
            transition: color 0.3s ease;
        }

        .product-card:hover .product-title {
            color: #6b8e23;
        }

        .product-price {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .product-btn {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .product-btn::before {
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

        .product-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .product-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 24px;
            padding: 3rem 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(45, 80, 22, 0.3);
            animation: fadeInUp 0.8s ease;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -100px;
            right: -100px;
            animation: pulse 3s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-btn {
            background: white;
            color: #2d5016;
            padding: 1rem 3rem;
            font-size: 1.2rem;
            border-radius: 50px;
            font-weight: 700;
            border: none;
            transition: all 0.3s ease;
        }

        .cta-btn:hover {
            transform: translateY(-5px) scale(1.05);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }

            .hero-btn {
                padding: 0.8rem 2rem;
                font-size: 1rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .stat-number {
                font-size: 2.5rem;
            }

            .cta-title {
                font-size: 2rem;
            }
        }
    </style>

    <!-- ===== HERO SECTION ===== -->
    <div class="hero-section text-white">
        <div class="hero-content">
            <div class="hero-logo mb-4">
                <img src="{{ asset('images/logo-protani.png') }}" alt="Protani Logo" height="120">
            </div>
            <h1 class="hero-title">Protani Indonesia</h1>
            <p class="hero-subtitle mb-3">🌾 Produk Pertanian Terpercaya</p>
            <p class="hero-description mb-4">Mendukung petani lokal, menghadirkan produk berkualitas untuk Indonesia</p>
            <div class="hero-buttons d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('products') }}" class="btn btn-light hero-btn">
                    <i class="fas fa-shopping-bag me-2"></i> Lihat Semua Produk
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-outline-light hero-btn">
                    <i class="fas fa-plus me-2"></i> Tambah Produk
                </a>
            </div>
        </div>
    </div>

    <!-- ===== STATS SECTION ===== -->
    <div class="stats-section">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="stat-icon">📦</div>
                    <div class="stat-number">{{ $totalProducts }}</div>
                    <p class="text-muted mb-0 fs-5 fw-semibold">Produk Tersedia</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="stat-icon">📂</div>
                    <div class="stat-number">{{ $categories->count() }}</div>
                    <p class="text-muted mb-0 fs-5 fw-semibold">Kategori Produk</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card h-100">
                    <div class="stat-icon">🇮🇩</div>
                    <div class="stat-number">100%</div>
                    <p class="text-muted mb-0 fs-5 fw-semibold">Produk Lokal</p>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== CATEGORIES SECTION ===== -->
    <div class="mb-5">
        <div class="section-header">
            <h2 class="section-title">📂 Kategori Produk</h2>
        </div>
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-md-3 col-sm-6">
                    <div class="card category-card h-100">
                        <div class="category-icon">{{ $category->icon }}</div>
                        <h5 class="fw-bold mb-2">{{ $category->name }}</h5>
                        <p class="text-muted small mb-3">{{ $category->description }}</p>
                        <span class="category-badge">{{ $category->products_count }} Produk</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ===== RECOMMENDED PRODUCTS SECTION ===== -->
    @if($recommendedProducts->count() > 0)
    <div class="mb-5">
        <div class="section-header">
            <h2 class="section-title"> Rekomendasi untuk Anda</h2>
            <p class="text-muted">Produk pilihan berdasarkan preferensi Anda</p>
        </div>

        <div class="row g-4">
            @foreach($recommendedProducts as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card product-card h-100">
                        <div class="card-body position-relative">
                            <span class="product-badge">{{ $product->category->icon }}</span>

                            <h5 class="product-title mt-3">{{ $product->name }}</h5>
                            <p class="text-muted small fw-semibold mb-2">
                                {{ $product->category->name }}
                            </p>
                            <p class="text-muted mb-3">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="product-price">{{ $product->formatted_price }}</div>
                                    <small class="text-muted">per {{ $product->unit }}</small>
                                </div>
                                @if($product->origin)
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> {{ $product->origin }}
                                    </small>
                                @endif
                            </div>

                            <a href="{{ route('products.show', $product->id) }}" class="btn product-btn w-100">
                                <i class="fas fa-eye me-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- ===== FEATURED PRODUCTS SECTION ===== -->
    <div class="mb-5">
        <div class="section-header">
            <h2 class="section-title">⭐ Produk Pilihan </h2>
        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card product-card h-100">
                        <div class="card-body position-relative">
                            <span class="product-badge">{{ $product->category->icon }}</span>

                            <h5 class="product-title mt-3">{{ $product->name }}</h5>
                            <p class="text-muted small fw-semibold mb-2">
                                {{ $product->category->name }}
                            </p>
                            <p class="text-muted mb-3">
                                {{ Str::limit($product->description, 80) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <div class="product-price">{{ $product->formatted_price }}</div>
                                    <small class="text-muted">per {{ $product->unit }}</small>
                                </div>
                                @if($product->origin)
                                    <small class="text-muted">
                                        <i class="fas fa-map-marker-alt"></i> {{ $product->origin }}
                                    </small>
                                @endif
                            </div>

                            <a href="{{ route('products.show', $product->id) }}" class="btn product-btn w-100">
                                <i class="fas fa-eye me-2"></i> Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- ===== CTA SECTION ===== -->
    <div class="cta-section text-white">
        <h3 class="cta-title mb-3">Punya Produk Pertanian?</h3>
        <p class="lead mb-4 fs-5">Daftarkan produk pertanian Anda sekarang dan jangkau pasar yang lebih luas!</p>
        <a href="{{ route('products.create') }}" class="btn cta-btn">
            <i class="fas fa-plus-circle me-2"></i> Daftarkan Produk Sekarang
        </a>
    </div>

</x-layout>
