<x-layout>
    <x-slot:title>Daftar Produk Pertanian</x-slot:title>

    <div class="mb-4">
        <h1 class="mb-1">
            <img src="{{ asset('images/logo-protani.png') }}" alt="Protani Logo" height="120" class="me-2">
            Daftar Produk Pertanian</h1>
        <p class="text-muted">Kelola produk hasil pertanian lokal Indonesia</p>
    </div>

    <!-- Search & Filter Section -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('products') }}" method="GET">
                <div class="row g-3">
                    <!-- Search -->
                    <div class="col-md-4">
                        <label class="form-label">🔍 Cari Produk</label>
                        <input type="text" name="search" class="form-control"
                               placeholder="Nama atau deskripsi produk..."
                               value="{{ request('search') }}">
                    </div>

                    <!-- Category Filter -->
                    <div class="col-md-3">
                        <label class="form-label">📂 Kategori</label>
                        <select name="category" class="form-select">
                            <option value="">Semua Kategori</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->icon }} {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Min Price -->
                    <div class="col-md-2">
                        <label class="form-label">💰 Harga Min</label>
                        <input type="number" name="min_price" class="form-control"
                               placeholder="0" value="{{ request('min_price') }}" step="1000">
                    </div>

                    <!-- Max Price -->
                    <div class="col-md-2">
                        <label class="form-label">💰 Harga Max</label>
                        <input type="number" name="max_price" class="form-control"
                               placeholder="1000000" value="{{ request('max_price') }}" step="1000">
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-1 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                    </div>
                </div>

                <!-- Sort Options -->
                <div class="row g-3 mt-2">
                    <div class="col-md-3">
                        <label class="form-label">↕️ Urutkan Berdasarkan</label>
                        <select name="sort_by" class="form-select">
                            <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama</option>
                            <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Harga</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">📊 Urutan</label>
                        <select name="sort_order" class="form-select">
                            <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>A-Z / Terendah</option>
                            <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Z-A / Tertinggi</option>
                        </select>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <a href="{{ route('products') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>

                    <div class="col-md-5 d-flex align-items-end justify-content-end">
                        <a href="{{ route('products.create') }}" class="btn btn-success">
                            ➕ Tambah Produk Baru
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100 shadow-sm hover-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0">{{ $product->name }}</h5>
                            <span class="badge bg-success">{{ $product->category->icon }}</span>
                        </div>
                        <p class="text-muted small mb-2">{{ $product->category->name }}</p>
                        <p class="card-text small text-muted">{{ Str::limit($product->description, 60) }}</p>
                        <div class="mb-3">
                            <span class="fs-5 fw-bold text-success">{{ $product->formatted_price }}</span>
                            <small class="text-muted">/ {{ $product->unit }}</small>
                        </div>
                        <div class="d-flex gap-1">
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info flex-fill">Lihat</a>

                            @auth
                                <!-- Add to Cart Button -->
                                <button type="button"
                                        class="btn btn-sm btn-success flex-fill"
                                        data-bs-toggle="modal"
                                        data-bs-target="#addToCartModal{{ $product->id }}">
                                    🛒 Beli
                                </button>
                            @else
                                <a href="{{ route('login') }}"
                                   class="btn btn-sm btn-success flex-fill">
                                    🔐 Login untuk Beli
                                </a>
                            @endauth

                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning flex-fill">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    <h5>Tidak ada produk ditemukan</h5>
                    <p class="mb-0">Coba ubah filter atau kata kunci pencarian</p>
                </div>
            </div>
        @endforelse

        <!-- Add to Cart Modals -->
        @foreach($products as $product)
            <div class="modal fade" id="addToCartModal{{ $product->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">🛒 Tambah ke Keranjang</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="text-center mb-3">
                                    <div class="display-4 mb-2">{{ $product->category->icon }}</div>
                                    <h5 class="fw-bold">{{ $product->name }}</h5>
                                    <p class="text-success fw-bold mb-0">{{ $product->formatted_price }} / {{ $product->unit }}</p>
                                    <small class="text-muted">Stok: {{ $product->stock }} {{ $product->unit }}</small>
                                </div>

                                <div class="mb-3">
                                    <label for="quantity{{ $product->id }}" class="form-label">Jumlah:</label>
                                    <input type="number"
                                        class="form-control form-control-lg text-center"
                                        id="quantity{{ $product->id }}"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        max="{{ $product->stock }}"
                                        required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">
                                    ✅ Tambah ke Keranjang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $products->links() }}
    </div>

    <div class="mt-3 text-muted">
        <small>Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk</small>
    </div>

    <style>
        .hover-card {
            transition: all 0.3s ease;
        }
        .hover-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15) !important;
        }
    </style>
</x-layout>
