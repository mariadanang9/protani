<x-layout>
    <x-slot:title>{{ isset($product) ? 'Edit Produk' : 'Tambah Produk' }}</x-slot:title>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">
                        {{ isset($product) ? '✏️ Edit Produk' : '➕ Tambah Produk Baru' }}
                    </h2>
                </div>
                <div class="card-body p-4">
                    <form action="{{ isset($product) ? route('products.update', $product['id']) : route('products.store') }}"
                          method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                            <input type="text"
                                   class="form-control @error('name') is-invalid @enderror"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $product['name'] ?? '') }}"
                                   placeholder="Contoh: Tomat Organik"
                                   required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select class="form-select @error('category_id') is-invalid @enderror"
                                    id="category_id"
                                    name="category_id"
                                    required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->icon }} {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok <span class="text-danger">*</span></label>
                            <input type="number"
                                   class="form-control @error('stock') is-invalid @enderror"
                                   id="stock"
                                   name="stock"
                                   value="{{ old('stock', $product->stock ?? 100) }}"
                                   min="0"
                                   placeholder="100"
                                   required>
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="unit" class="form-label">Satuan <span class="text-danger">*</span></label>
                            <select class="form-select @error('unit') is-invalid @enderror"
                                    id="unit"
                                    name="unit"
                                    required>
                                <option value="kg" {{ old('unit', $product->unit ?? '') == 'kg' ? 'selected' : '' }}>Kilogram (kg)</option>
                                <option value="ikat" {{ old('unit', $product->unit ?? '') == 'ikat' ? 'selected' : '' }}>Ikat</option>
                                <option value="buah" {{ old('unit', $product->unit ?? '') == 'buah' ? 'selected' : '' }}>Buah</option>
                                <option value="sisir" {{ old('unit', $product->unit ?? '') == 'sisir' ? 'selected' : '' }}>Sisir</option>
                            </select>
                            @error('unit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="origin" class="form-label">Asal Daerah</label>
                            <input type="text"
                                   class="form-control @error('origin') is-invalid @enderror"
                                   id="origin"
                                   name="origin"
                                   value="{{ old('origin', $product->origin ?? '') }}"
                                   placeholder="Contoh: Bandung, Malang, Medan">
                            @error('origin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Daerah asal produk pertanian</div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description"
                                      name="description"
                                      rows="5"
                                      placeholder="Jelaskan detail produk pertanian..."
                                      required>{{ old('description', $product['description'] ?? '') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Jelaskan kualitas, asal, dan keunggulan produk</div>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="form-label">Harga (Rp/kg) <span class="text-danger">*</span></label>
                            <input type="number"
                                   class="form-control @error('price') is-invalid @enderror"
                                   id="price"
                                   name="price"
                                   value="{{ old('price', $product['price'] ?? '') }}"
                                   min="0"
                                   step="1000"
                                   placeholder="15000"
                                   required>
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Harga per kilogram dalam Rupiah</div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products') }}" class="btn btn-secondary">
                                ← Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                {{ isset($product) ? '💾 Update Produk' : '➕ Tambah Produk' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
