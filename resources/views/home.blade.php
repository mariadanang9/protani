<x-layout>
    <x-slot:title>Home - Protani Indonesia</x-slot:title>

    <!-- Hero Section -->
    <div class="hero-section text-white text-center py-5 mb-5 rounded shadow-lg" style="background: linear-gradient(135deg, #2d5016 0%, #6b8e23 100%);">
        <div class="container">
            <div class="mb-4">
                <span class="display-1">
                    <img src="{{ asset('images/logo-protani.png') }}" alt="Protani Logo" height="120" class="me-2">
                </span>
            </div>
            <h1 class="display-3 fw-bold mb-3">Protani Indonesia</h1>
            <p class="lead mb-4 fs-4"> Produk Pertanian Terpercaya</p>
            <p class="mb-4 fs-5">Mendukung petani lokal, menghadirkan produk berkualitas untuk Indonesia</p>
            <div class="d-flex gap-3 justify-content-center flex-wrap">
                <a href="{{ route('products') }}" class="btn btn-light btn-lg px-5 py-3">
                    📦 Lihat Semua Produk
                </a>
                <a href="{{ route('products.create') }}" class="btn btn-outline-light btn-lg px-5 py-3">
                    ➕ Tambah Produk
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="row text-center mb-5 g-4">
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body p-4">
                    <div class="display-4 mb-3">📦</div>
                    <h3 class="fw-bold text-success display-5">{{ $totalProducts }}</h3>
                    <p class="text-muted mb-0 fs-5">Produk Tersedia</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body p-4">
                    <div class="display-4 mb-3">📂</div>
                    <h3 class="fw-bold text-success display-5">{{ $categories->count() }}</h3>
                    <p class="text-muted mb-0 fs-5">Kategori Produk</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body p-4">
                    <div class="display-4 mb-3">🇮🇩</div>
                    <h3 class="fw-bold text-success display-5">100%</h3>
                    <p class="text-muted mb-0 fs-5">Produk Lokal</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section -->
    <div class="mb-5">
        <h2 class="text-center mb-4 fw-bold">📂 Kategori Produk</h2>
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-md-3">
                    <div class="card shadow-sm h-100 border-0 hover-scale">
                        <div class="card-body text-center p-4">
                            <div class="display-3 mb-3">{{ $category->icon }}</div>
                            <h5 class="card-title fw-bold">{{ $category->name }}</h5>
                            <p class="text-muted small mb-3">{{ $category->description }}</p>
                            <span class="badge bg-success fs-6">{{ $category->products_count }} Produk</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Featured Products Section -->
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold mb-0">⭐ Produk Pilihan</h2>
            <a href="{{ route('products') }}" class="btn btn-success">Lihat Semua →</a>
        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
                <div class="col-md-4">
                    <div class="card shadow-sm h-100 border-0 hover-scale">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold mb-0">{{ $product->name }}</h5>
                                <span class="badge bg-success fs-6">{{ $product->category->icon }}</span>
                            </div>
                            <p class="text-muted small mb-2">
                                <strong>{{ $product->category->name }}</strong>
                            </p>
                            <p class="card-text text-muted mb-3">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <span class="fs-4 fw-bold text-success">{{ $product->formatted_price }}</span>
                                    <small class="text-muted d-block">per {{ $product->unit }}</small>
                                </div>
                                @if($product->origin)
                                    <small class="text-muted">📍 {{ $product->origin }}</small>
                                @endif
                            </div>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-success w-100">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Call to Action -->
    <div class="card bg-success text-white text-center shadow-lg mb-5">
        <div class="card-body p-5">
            <h3 class="fw-bold mb-3">Punya Produk Pertanian?</h3>
            <p class="lead mb-4">Daftarkan produk pertanian Anda sekarang dan jangkau pasar yang lebih luas!</p>
            <a href="{{ route('products.create') }}" class="btn btn-light btn-lg px-5">
                ➕ Daftarkan Produk Sekarang
            </a>
        </div>
    </div>

    <style>
        .hover-scale {
            transition: all 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2) !important;
        }
        .hero-section {
            animation: fadeIn 1s ease-in;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</x-layout>
