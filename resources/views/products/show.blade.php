<x-layout>
    <x-slot:title>{{ $product->name }} - Protani Indonesia</x-slot:title>

    <div class="container">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products') }}">Produk</a></li>
                <li class="breadcrumb-item active">{{ $product->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Product Info -->
            <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <!-- Product Header -->
                        <div class="d-flex justify-content-between align-items-start mb-4">
                            <div>
                                <h1 class="fw-bold mb-2">{{ $product->name }}</h1>
                                <div class="d-flex align-items-center gap-3">
                                    <span class="badge bg-success fs-6">
                                        {{ $product->category->icon }} {{ $product->category->name }}
                                    </span>
                                    @if($product->origin)
                                        <span class="text-muted">
                                            📍 {{ $product->origin }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle"
                                            type="button"
                                            data-bs-toggle="dropdown">
                                        ⋮
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                                ✏️ Edit Produk
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <form action="{{ route('products.destroy', $product->id) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger">
                                                    🗑️ Hapus Produk
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            @endauth
                        </div>

                        <!-- Price & Stock -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Harga</p>
                                        <h2 class="fw-bold text-success mb-0">
                                            {{ $product->formatted_price }}
                                        </h2>
                                        <small class="text-muted">per {{ $product->unit }}</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-light border-0">
                                    <div class="card-body">
                                        <p class="text-muted mb-1">Ketersediaan Stok</p>
                                        @if($product->stock > 0)
                                            <h2 class="fw-bold text-success mb-0">
                                                {{ $product->stock }} {{ $product->unit }}
                                            </h2>
                                            <small class="text-success">✓ Tersedia</small>
                                        @else
                                            <h2 class="fw-bold text-danger mb-0">Habis</h2>
                                            <small class="text-danger">✗ Stok habis</small>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">📝 Deskripsi Produk</h5>
                            <p class="text-muted" style="white-space: pre-line;">{{ $product->description }}</p>
                        </div>

                        <!-- Product Details -->
                        <div class="mb-4">
                            <h5 class="fw-bold mb-3">ℹ️ Detail Produk</h5>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="text-muted" width="150">Kategori</td>
                                    <td class="fw-bold">{{ $product->category->icon }} {{ $product->category->name }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Satuan</td>
                                    <td class="fw-bold">{{ $product->unit }}</td>
                                </tr>
                                @if($product->origin)
                                <tr>
                                    <td class="text-muted">Asal Daerah</td>
                                    <td class="fw-bold">📍 {{ $product->origin }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-muted">Harga</td>
                                    <td class="fw-bold text-success">{{ $product->formatted_price }} / {{ $product->unit }}</td>
                                </tr>
                                <tr>
                                    <td class="text-muted">Stok</td>
                                    <td class="fw-bold">
                                        @if($product->stock > 0)
                                            <span class="text-success">{{ $product->stock }} {{ $product->unit }}</span>
                                        @else
                                            <span class="text-danger">Habis</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('products') }}" class="btn btn-outline-secondary">
                                ← Kembali ke Daftar Produk
                            </a>
                            @auth
                                @if($product->stock > 0)
                                    <button type="button"
                                            class="btn btn-success flex-fill"
                                            data-bs-toggle="modal"
                                            data-bs-target="#addToCartModal">
                                        🛒 Tambah ke Keranjang
                                    </button>
                                @else
                                    <button type="button" class="btn btn-secondary flex-fill" disabled>
                                        Stok Habis
                                    </button>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="btn btn-success flex-fill">
                                    🔐 Login untuk Membeli
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Category Info Card -->
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">📂 Kategori</h5>
                        <div class="d-flex align-items-center mb-3">
                            <div class="display-4 me-3">{{ $product->category->icon }}</div>
                            <div>
                                <h6 class="fw-bold mb-1">{{ $product->category->name }}</h6>
                                <p class="text-muted small mb-0">{{ $product->category->description }}</p>
                            </div>
                        </div>
                        <a href="{{ route('products', ['category' => $product->category_id]) }}"
                           class="btn btn-outline-success btn-sm w-100">
                            Lihat Produk Lainnya
                        </a>
                    </div>
                </div>

                <!-- Seller Info Card (if needed) -->
                <div class="card shadow-sm mb-4 bg-light border-0">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🏪 Informasi Penjual</h5>
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                 style="width: 50px; height: 50px; font-size: 24px;">
                                🌾
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0">Protani Indonesia</h6>
                                <small class="text-muted">Penjual Terpercaya</small>
                            </div>
                        </div>
                        <div class="small text-muted">
                            <p class="mb-2">✓ Produk Berkualitas</p>
                            <p class="mb-2">✓ Pengiriman Cepat</p>
                            <p class="mb-0">✓ Garansi Kualitas</p>
                        </div>
                    </div>
                </div>

                <!-- Share Card -->
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="fw-bold mb-3">🔗 Bagikan Produk</h5>
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-success btn-sm"
                                    onclick="copyToClipboard('{{ route('products.show', $product->id) }}')">
                                📋 Salin Link
                            </button>
                            <a href="https://wa.me/?text={{ urlencode($product->name . ' - ' . route('products.show', $product->id)) }}"
                               target="_blank"
                               class="btn btn-outline-success btn-sm">
                                📱 Bagikan via WhatsApp
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Cart Modal -->
    @auth
    @if($product->stock > 0)
    <div class="modal fade" id="addToCartModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">🛒 Tambah ke Keranjang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('cart.add', $product) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <h6 class="fw-bold">{{ $product->name }}</h6>
                            <p class="text-muted mb-1">{{ $product->formatted_price }} / {{ $product->unit }}</p>
                            <p class="text-muted small">Stok tersedia: <strong>{{ $product->stock }} {{ $product->unit }}</strong></p>
                        </div>

                        <div class="mb-3">
                            <label for="quantity" class="form-label fw-bold">Jumlah</label>
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-secondary" onclick="decrementQty()">-</button>
                                <input type="number"
                                       id="quantity"
                                       name="quantity"
                                       class="form-control text-center"
                                       min="1"
                                       max="{{ $product->stock }}"
                                       value="1"
                                       required>
                                <button type="button" class="btn btn-outline-secondary" onclick="incrementQty({{ $product->stock }})">+</button>
                            </div>
                            <small class="text-muted">Maksimal: {{ $product->stock }} {{ $product->unit }}</small>
                        </div>

                        <div class="alert alert-info mb-0">
                            <strong>Total Harga:</strong>
                            <span id="totalPrice" class="float-end fw-bold">{{ $product->formatted_price }}</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">
                            Tambah ke Keranjang
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    @endauth

    <script>
        const pricePerUnit = {{ $product->price }};

        function incrementQty(maxStock) {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) < maxStock) {
                input.value = parseInt(input.value) + 1;
                updateTotalPrice();
            }
        }

        function decrementQty() {
            const input = document.getElementById('quantity');
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                updateTotalPrice();
            }
        }

        function updateTotalPrice() {
            const qty = parseInt(document.getElementById('quantity').value);
            const total = pricePerUnit * qty;
            document.getElementById('totalPrice').textContent =
                'Rp ' + total.toLocaleString('id-ID');
        }

        // Update price on manual input change
        document.getElementById('quantity')?.addEventListener('input', updateTotalPrice);

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                alert('Link berhasil disalin! 📋');
            });
        }
    </script>

    <style>
        .table-borderless td {
            padding: 0.5rem 0;
        }

        .hover-zoom {
            transition: transform 0.3s ease;
        }

        .hover-zoom:hover {
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .display-4 {
                font-size: 2rem;
            }
        }
    </style>
</x-layout>
