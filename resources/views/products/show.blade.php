<x-layout>
    <x-slot:title>{{ $product['name'] }}</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">📦 Detail Produk</h2>
                    <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-warning btn-sm">
                        ✏️ Edit Produk
                    </a>
                </div>
                <div class="card-body p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="bg-light p-4 rounded text-center">
                                <h1 class="display-5 mb-2">{{ $product['name'] }}</h1>
                                <span class="badge bg-success fs-6">{{ $product['category'] }}</span>
                            </div>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <th width="200" class="bg-light">ID Produk</th>
                            <td><strong>#{{ $product['id'] }}</strong></td>
                        </tr>
                        <tr>
                            <th class="bg-light">Nama Produk</th>
                            <td>{{ $product['name'] }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Kategori</th>
                            <td>{{ $product['category'] }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Deskripsi</th>
                            <td>{{ $product['description'] }}</td>
                        </tr>
                        <tr>
                            <th class="bg-light">Harga</th>
                            <td>
                                <span class="fs-4 text-success">
                                    <strong>Rp {{ number_format($product['price'], 0, ',', '.') }}</strong>
                                </span>
                                <small class="text-muted d-block">per kilogram</small>
                            </td>
                        </tr>
                    </table>

                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('products') }}" class="btn btn-secondary">
                            ← Kembali ke Daftar
                        </a>
                        <a href="{{ route('products.edit', $product['id']) }}" class="btn btn-warning">
                            ✏️ Edit Produk
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
