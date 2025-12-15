<x-layout>
    <x-slot:title>Checkout</x-slot:title>

    <x-breadcrumb :items="[
        ['label' => 'Produk', 'url' => route('products')],
        ['label' => 'Keranjang', 'url' => route('cart.index')],
        ['label' => 'Checkout', 'url' => '#']
    ]" />

    <div class="checkout-header mb-4">
        <h1 class="fw-bold">💳 Checkout</h1>
        <p class="text-muted">Lengkapi informasi pengiriman dan pembayaran</p>
    </div>

    <div class="row">
        <!-- Order Summary -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm border-0 sticky-top" style="top: 20px;">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">📦 Ringkasan Pesanan</h5>
                </div>
                <div class="card-body">
                    @foreach($carts as $cart)
                        <div class="order-item mb-3 pb-3 border-bottom">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div class="flex-grow-1">
                                    <div class="d-flex align-items-center mb-1">
                                        <span class="me-2">{{ $cart->product->category->icon }}</span>
                                        <h6 class="mb-0">{{ $cart->product->name }}</h6>
                                    </div>
                                    <small class="text-muted">
                                        {{ $cart->product->formatted_price }} × {{ $cart->quantity }} {{ $cart->product->unit }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    <strong class="text-success">
                                        Rp {{ number_format($cart->subtotal, 0, ',', '.') }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="summary-info mb-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Item:</span>
                            <strong>{{ $carts->count() }} produk</strong>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Total Quantity:</span>
                            <strong>{{ $carts->sum('quantity') }} pcs</strong>
                        </div>
                    </div>

                    <hr>

                    <div class="total-section">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="mb-0">Total Pembayaran:</h5>
                            <h3 class="mb-0 text-success fw-bold">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Checkout Form -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">📝 Informasi Pengiriman & Pembayaran</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('checkout.store') }}" method="POST" id="checkoutForm" data-loading="true">
                        @csrf

                        <!-- Shipping Address -->
                        <div class="mb-4">
                            <label for="shipping_address" class="form-label fw-bold">
                                📍 Alamat Pengiriman <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control form-control-lg @error('shipping_address') is-invalid @enderror"
                                      id="shipping_address"
                                      name="shipping_address"
                                      rows="4"
                                      placeholder="Masukkan alamat lengkap untuk pengiriman (minimal 10 karakter)"
                                      required>{{ old('shipping_address', Auth::user()->address) }}</textarea>
                            @error('shipping_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Pastikan alamat lengkap dengan nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan, kota, dan kode pos
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                💰 Metode Pembayaran <span class="text-danger">*</span>
                            </label>

                            <div class="payment-methods">
                                <!-- Transfer Bank -->
                                <div class="payment-option mb-3">
                                    <input type="radio"
                                           class="btn-check"
                                           name="payment_method"
                                           id="payment_transfer"
                                           value="transfer"
                                           {{ old('payment_method') == 'transfer' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success w-100 text-start p-3" for="payment_transfer">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">🏦</div>
                                            <div class="flex-grow-1">
                                                <strong class="d-block">Transfer Bank</strong>
                                                <small class="text-muted">BCA, Mandiri, BNI, BRI</small>
                                            </div>
                                            <div class="check-icon">✓</div>
                                        </div>
                                    </label>
                                </div>

                                <!-- Cash on Delivery -->
                                <div class="payment-option mb-3">
                                    <input type="radio"
                                           class="btn-check"
                                           name="payment_method"
                                           id="payment_cod"
                                           value="cod"
                                           {{ old('payment_method') == 'cod' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success w-100 text-start p-3" for="payment_cod">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">💵</div>
                                            <div class="flex-grow-1">
                                                <strong class="d-block">Cash on Delivery (COD)</strong>
                                                <small class="text-muted">Bayar saat barang tiba</small>
                                            </div>
                                            <div class="check-icon">✓</div>
                                        </div>
                                    </label>
                                </div>

                                <!-- E-Wallet -->
                                <div class="payment-option mb-3">
                                    <input type="radio"
                                           class="btn-check"
                                           name="payment_method"
                                           id="payment_ewallet"
                                           value="ewallet"
                                           {{ old('payment_method') == 'ewallet' ? 'checked' : '' }}>
                                    <label class="btn btn-outline-success w-100 text-start p-3" for="payment_ewallet">
                                        <div class="d-flex align-items-center">
                                            <div class="payment-icon me-3">📱</div>
                                            <div class="flex-grow-1">
                                                <strong class="d-block">E-Wallet</strong>
                                                <small class="text-muted">GoPay, OVO, Dana, ShopeePay</small>
                                            </div>
                                            <div class="check-icon">✓</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            @error('payment_method')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    Saya setuju dengan <a href="#" class="text-success">syarat dan ketentuan</a> yang berlaku
                                </label>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Action Buttons -->
                        <div class="d-flex gap-3">
                            <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary btn-lg flex-fill">
                                ← Kembali ke Keranjang
                            </a>
                            <button type="submit" class="btn btn-success btn-lg flex-fill order-button">
                                <span class="button-text">💳 Buat Pesanan</span>
                                <span class="button-loading d-none">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Memproses...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .checkout-header {
            animation: fadeIn 0.5s ease;
        }

        .payment-option .btn-check:checked + label {
            background-color: #d1fae5;
            border-color: #2d5016;
            border-width: 2px;
        }

        .payment-option .check-icon {
            opacity: 0;
            transition: opacity 0.3s ease;
            color: #2d5016;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .payment-option .btn-check:checked + label .check-icon {
            opacity: 1;
        }

        .payment-icon {
            font-size: 2rem;
        }

        .order-button {
            transition: all 0.3s ease;
        }

        .order-button:hover:not(:disabled) {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(45, 80, 22, 0.3);
        }

        .order-button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script>
        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
            const button = document.querySelector('.order-button');
            const buttonText = button.querySelector('.button-text');
            const buttonLoading = button.querySelector('.button-loading');

            // Show loading state
            buttonText.classList.add('d-none');
            buttonLoading.classList.remove('d-none');
            button.disabled = true;
        });
    </script>
    <x-loading-overlay />
</x-layout>
