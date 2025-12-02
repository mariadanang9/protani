<x-layout>
    <x-slot:title>Daftar Produk Pertanian</x-slot:title>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">🌾 Daftar Produk Pertanian</h1>
            <p class="text-muted">Kelola produk hasil pertanian lokal Indonesia</p>

            <x-layout>
                <x-slot:title>Daftar Produk Pertanian</x-slot:title>

                <div class="row">
                    <div class="col-md-3">
                        <div class="card shadow-sm mb-4">
                            <div class="card-header bg-light">
                                ⚙️ Opsi Pencarian & Filter
                            </div>
                            <div class="card-body">
                                <form method="GET" action="{{ route('products') }}">

                                    <div class="mb-3">
                                        <label for="search" class="form-label">Cari Produk</label>
                                        <div class="input-group">
                                            <input type="text" name="search" id="search" class="form-control"
                                                placeholder="Nama atau Deskripsi"
                                                value="{{ request('search') }}">
                                            <button class="btn btn-primary" type="submit">🔍</button>
                                        </div>
                                    </div>

                                    <h6 class="mt-4 mb-2">Filter Harga</h6>
                                    <div class="mb-3">
                                        <label for="price_min" class="form-label">Harga Minimum (Rp)</label>
                                        <input type="number" name="price_min" id="price_min" class="form-control form-control-sm"
                                            placeholder="Contoh: 10000"
                                            min="0" value="{{ request('price_min') }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="price_max" class="form-label">Harga Maksimum (Rp)</label>
                                        <input type="number" name="price_max" id="price_max" class="form-control form-control-sm"
                                            placeholder="Contoh: 50000"
                                            min="0" value="{{ request('price_max') }}">
                                    </div>

                                    <button type="submit" class="btn btn-success w-100 mb-2">Terapkan Filter</button>
                                    <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100">Reset</a>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <form method="GET" action="{{ route('products') }}" id="sortForm">
                                    @foreach(request()->except(['sort', 'page']) as $key => $value)
                                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                    @endforeach

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <label for="sort" class="col-form-label">Urutkan Berdasarkan:</label>
                                        </div>
                                        <div class="col-auto">
                                            <select name="sort" id="sort" class="form-select" onchange="document.getElementById('sortForm').submit()">
                                                <option value="">Terbaru (Default)</option>
                                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Nama Produk (A-Z)</option>
                                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Nama Produk (Z-A)</option>
                                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga Termurah</option>
                                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Termahal</option>
                                            </select>
                                        </div>
                                        <div class="col text-end">
                                            <small class="text-muted">Ditemukan: <strong>{{ count($products) }}</strong> produk</small>
                                        </div>
                                    </div>
                                </form>
                            </div>
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
                                                    {{-- Karena sudah menggunakan DB, ID pasti ada --}}
                                                    <td><strong>#{{ $product->id }}</strong></td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>
                                                        {{-- Akses nama kategori lewat relasi --}}
                                                        <span class="badge bg-success">{{ $product->category->name ?? 'N/A' }}</span>
                                                    </td>
                                                    <td>{{ Str::limit($product->description, 50) }}</td>
                                                    <td><strong>Rp {{ number_format($product->price, 0, ',', '.') }}</strong></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <a href="{{ route('products.show', $product->id) }}"
                                                            class="btn btn-sm btn-info">Lihat</a>
                                                            <a href="{{ route('products.edit', $product->id) }}"
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
                            <small>Menampilkan <strong>{{ count($products) }}</strong> produk pertanian</small>
                        </div>

                    </div>
                    </div>
                </x-layout>
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
