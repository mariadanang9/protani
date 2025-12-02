<x-layout>
    <x-slot:title>Daftar Produk Pertanian</x-slot:title>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">🌾 Daftar Produk Pertanian</h1>
            <p class="text-muted">Kelola produk hasil pertanian lokal Indonesia</p>
        </div>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            ➕ Add new product
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>#{{ $product['id'] }}</strong></td>
                                <td>{{ $product['name'] }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $product['category'] }}</span>
                                </td>
                                <td>{{ Str::limit($product['description'], 50) }}</td>
                                <td><strong>Rp {{ number_format($product['price'], 0, ',', '.') }}</strong></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('products.show', $product['id']) }}"
                                           class="btn btn-sm btn-info">Lihat</a>
                                        <a href="{{ route('products.edit', $product['id']) }}"
                                           class="btn btn-sm btn-warning">Edit</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="mt-3 text-muted">
        <small>Total: <strong>{{ count($products) }}</strong> produk pertanian</small>
    </div>
</x-layout>
