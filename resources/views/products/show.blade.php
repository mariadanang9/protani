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
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">
                            ✏️ Edit Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
