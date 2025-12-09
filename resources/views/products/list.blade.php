<x-layout>
    <x-slot:title>Daftar Produk Pertanian</x-slot:title>

    <div class="mb-4">
        <h1 class="mb-1">🌾 Daftar Produk Pertanian</h1>
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
