<x-layout>
    <x-slot:title>{{ $product->name }}</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center py-3">
                    <h2 class="mb-0">📦 Detail Produk</h2>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                        ✏️ Edit Produk
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="bg-light p-4 rounded text-center">
                                <span class="display-1 mb-3">{{ $product->category->icon }}</span>
                                <h1 class="display-5 mb-2 fw-bold">{{ $product->name }}</h1>
                                <span class="badge bg-success fs-5">{{ $product->category->name }}</span>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th width="200" class="bg-light">ID Produk</th>
                            <td><strong>#{{ $product->id }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nama Produk</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Kategori</th>
                            <td>{{ $product->category->icon }} {{ $product->category->name }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Deskripsi</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Harga</th>
                            <td>
                                <span class="fs-3 text-success fw-bold">
                                    {{ $product->formatted_price }}
                                </span>
                                <small class="text-muted d-block">per {{ $product->unit }}</small>
                            </td>
                        </tr>
                        <tr>
                            <th class="bg-light">Stok</th>
                            <td>
                                <span class="badge bg-info fs-6">{{ $product->stock }} {{ $product->unit }}</span>
                            </td>
                        </tr>
                        @if($product->origin)
                        <tr>
                            <th class="bg-light">Asal Daerah</th>
                            <td>📍 {{ $product->origin }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th class="bg-light">Ditambahkan</th>
                            <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Terakhir Update</th>
                            <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                        </tr>
                    </table>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('products') }}" class="btn btn-secondary">
                            ← Kembali ke Daftar
                        </a>
                        @auth
                            <!-- Add to Cart Button -->
                            <button type="button"
                                    class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#addToCartModalDetail">
                                🛒 Tambah ke Keranjang
                            </button>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success">
                                🔐 Login untuk Beli
                            </a>
                        @endauth

                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                            ✏️ Edit Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add to Cart Modal -->
    @auth
    <div class="modal fade" id="addToCartModalDetail" tabindex="-1">
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
                            <label for="quantityDetail" class="form-label">Jumlah:</label>
                            <input type="number"
                                   class="form-control form-control-lg text-center"
                                   id="quantityDetail"
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
    @endauth

</x-layout>
