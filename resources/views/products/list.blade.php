<x-layout>
    <x-slot:title>Daftar Produk - Protani Indonesia</x-slot:title>

    <div class="container">
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="fw-bold">📦 Daftar Produk Pertanian</h1>
                <p class="text-muted">Temukan berbagai produk pertanian berkualitas dari seluruh Indonesia</p>
            </div>
        </div>

        <!-- Search & Filter Form -->
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

                        <!-- Price Range -->
                        <div class="col-md-2">
                            <label class="form-label">💰 Harga Min</label>
                            <input type="number" name="min_price" class="form-control"
                                   placeholder="0" value="{{ request('min_price') }}">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label">💰 Harga Max</label>
                            <input type="number" name="max_price" class="form-control"
                                   placeholder="1000000" value="{{ request('max_price') }}">
                        </div>

                        <!-- Submit Button -->
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="submit" class="btn btn-success w-100">
                                Filter
                            </button>
                        </div>
                    </div>

                    <!-- Sort Options -->
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <label class="form-label">📊 Urutkan</label>
                            <select name="sort_by" class="form-select">
                                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Nama</option>
                                <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Harga</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">🔄 Urutan</label>
                            <select name="sort_order" class="form-select">
                                <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>A-Z / Rendah-Tinggi</option>
                                <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>Z-A / Tinggi-Rendah</option>
                            </select>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100">
                                Reset Filter
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Results Info -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <p class="text-muted mb-0">
                    Menampilkan {{ $products->count() }} dari {{ $products->total() }} produk
                </p>
            </div>
            @auth
                <a href="{{ route('products.create') }}" class="btn btn-success">
                    ➕ Tambah Produk Baru
                </a>
            @endauth
        </div>

        <!-- Products Grid -->
        @if($products->count() > 0)
            <div class="row g-4 mb-4">
                @foreach($products as $product)
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
                                    {{ Str::limit($product->description, 100) }}
                                </p>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="fs-4 fw-bold text-success">{{ $product->formatted_price }}</span>
                                            <small class="text-muted d-block">per {{ $product->unit }}</small>
                                        </div>
                                        @if($product->stock > 0)
                                            <span class="badge bg-success">
                                                Stok: {{ $product->stock }} {{ $product->unit }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">Habis</span>
                                        @endif
                                    </div>
                                </div>

                                @if($product->origin)
                                    <p class="text-muted small mb-3">
                                        📍 {{ $product->origin }}
                                    </p>
                                @endif

                                <div class="d-flex gap-2">
                                    <a href="{{ route('products.show', $product->id) }}"
                                       class="btn btn-success flex-fill">
                                        Lihat Detail
                                    </a>
                                    @auth
                                        @if($product->stock > 0)
                                            <button type="button"
                                                    class="btn btn-outline-success"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#addToCartModal{{ $product->id }}">
                                                🛒
                                            </button>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart Modal -->
                    @auth
                    <div class="modal fade" id="addToCartModal{{ $product->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah ke Keranjang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <form action="{{ route('cart.add', $product) }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <h6 class="fw-bold">{{ $product->name }}</h6>
                                        <p class="text-muted">{{ $product->formatted_price }} / {{ $product->unit }}</p>
                                        <p class="text-muted small">Stok tersedia: {{ $product->stock }} {{ $product->unit }}</p>

                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number"
                                                   name="quantity"
                                                   class="form-control"
                                                   min="1"
                                                   max="{{ $product->stock }}"
                                                   value="1"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-success">Tambah ke Keranjang</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endauth
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="display-1 mb-3">📭</div>
                    <h4 class="fw-bold mb-3">Produk Tidak Ditemukan</h4>
                    <p class="text-muted mb-4">
                        Maaf, tidak ada produk yang sesuai dengan kriteria pencarian Anda.
                    </p>
                    <a href="{{ route('products') }}" class="btn btn-success">
                        Lihat Semua Produk
                    </a>
                </div>
            </div>
        @endif
    </div>

    <style>
        .hover-scale {
            transition: all 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
        }
    </style>
</x-layout>
