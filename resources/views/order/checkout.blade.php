<x-layout>
    <x-slot:title>Checkout - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== CHECKOUT STEPS ===== */
        .checkout-steps {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .steps-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
        }

        .step {
            flex: 1;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .step-icon {
            width: 50px;
            height: 50px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 0.5rem;
            font-size: 1.5rem;
            transition: all 0.3s ease;
        }

        .step.active .step-icon,
        .step.completed .step-icon {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            transform: scale(1.1);
        }

        .step-label {
            font-weight: 600;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .step.active .step-label,
        .step.completed .step-label {
            color: #2d5016;
            font-weight: 700;
        }

        /* ===== FORM SECTION ===== */
        .checkout-form-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            animation: fadeInLeft 0.6s ease;
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.5rem;
        }

        .form-control,
        .form-select {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6b8e23;
            box-shadow: 0 0 0 3px rgba(107, 142, 35, 0.1);
        }

        .payment-options {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            margin-top: 1rem;
        }

        .payment-option {
            position: relative;
        }

        .payment-option input[type="radio"] {
            display: none;
        }

        .payment-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 1rem;
            border: 2px solid #e9ecef;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .payment-option input:checked + .payment-label {
            border-color: #6b8e23;
            background: linear-gradient(135deg, rgba(45, 80, 22, 0.05), rgba(107, 142, 35, 0.05));
            transform: scale(1.05);
        }

        .payment-label:hover {
            border-color: #6b8e23;
            transform: translateY(-3px);
        }

        .payment-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }

        .payment-name {
            font-weight: 600;
            color: #2d5016;
            font-size: 0.9rem;
        }

        /* ===== ORDER SUMMARY ===== */
        .order-summary {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: sticky;
            top: 90px;
            animation: fadeInRight 0.6s ease;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .order-item {
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }

        .order-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .order-item-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 0.5rem;
        }

        .order-item-icon {
            font-size: 2rem;
        }

        .order-item-name {
            font-weight: 700;
            color: #2d5016;
            flex: 1;
        }

        .order-item-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-left: 3rem;
            font-size: 0.9rem;
        }

        .order-item-qty {
            color: #6c757d;
        }

        .order-item-price {
            font-weight: 700;
            color: #2d5016;
        }

        .summary-divider {
            border-top: 2px dashed #e9ecef;
            margin: 1.5rem 0;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
        }

        .summary-label {
            color: #6c757d;
            font-weight: 600;
        }

        .summary-value {
            color: #2d5016;
            font-weight: 700;
        }

        .summary-total {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 12px;
            margin: 1rem 0;
        }

        .summary-total .summary-label {
            font-size: 1.2rem;
            color: #2d5016;
        }

        .summary-total .summary-value {
            font-size: 2rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-place-order {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: 12px;
            font-size: 1.2rem;
            font-weight: 700;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-place-order::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-place-order:hover::before {
            width: 400px;
            height: 400px;
        }

        .btn-place-order:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(45, 80, 22, 0.4);
        }

        .btn-back {
            background: white;
            color: #6c757d;
            border: 2px solid #e9ecef;
            margin-top: 0.5rem;
        }

        .btn-back:hover {
            background: #f8f9fa;
            border-color: #6c757d;
            color: #2d5016;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .order-summary {
                position: static;
                margin-top: 2rem;
            }

            .payment-options {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-credit-card me-2"></i> Checkout
        </h1>
        <p class="mb-0 fs-5">Lengkapi data untuk menyelesaikan pesanan Anda</p>
    </div>

    <!-- ===== CHECKOUT STEPS ===== -->
    <div class="checkout-steps">
        <div class="steps-container">
            <div class="step completed">
                <div class="step-icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="step-label">Keranjang</div>
            </div>
            <div class="step active">
                <div class="step-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <div class="step-label">Pembayaran</div>
            </div>
            <div class="step">
                <div class="step-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="step-label">Selesai</div>
            </div>
        </div>
    </div>

    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="row">
            <!-- ===== CHECKOUT FORM ===== -->
            <div class="col-lg-7">
                <div class="checkout-form-section mb-4">
                    <h3 class="section-title">
                        <i class="fas fa-map-marker-alt"></i> Alamat Pengiriman
                    </h3>

                    <div class="mb-3">
                        <label class="form-label">
                            <i class="fas fa-home me-2"></i>Alamat Lengkap
                        </label>
                        <textarea name="shipping_address" class="form-control" rows="4"
                                  placeholder="Masukkan alamat lengkap pengiriman..." required>{{ old('shipping_address') }}</textarea>
                        @error('shipping_address')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            <i class="fas fa-info-circle me-1"></i>Pastikan alamat lengkap dan jelas agar pesanan sampai dengan tepat
                        </small>
                    </div>
                </div>

                <div class="checkout-form-section">
                    <h3 class="section-title">
                        <i class="fas fa-wallet"></i> Metode Pembayaran
                    </h3>

                    <div class="payment-options">
                        <div class="payment-option">
                            <input type="radio" name="payment_method" value="transfer" id="transfer"
                                   {{ old('payment_method') == 'transfer' ? 'checked' : '' }} required>
                            <label for="transfer" class="payment-label">
                                <div class="payment-icon">🏦</div>
                                <div class="payment-name">Transfer Bank</div>
                            </label>
                        </div>

                        <div class="payment-option">
                            <input type="radio" name="payment_method" value="cod" id="cod"
                                   {{ old('payment_method') == 'cod' ? 'checked' : '' }}>
                            <label for="cod" class="payment-label">
                                <div class="payment-icon">💵</div>
                                <div class="payment-name">COD</div>
                            </label>
                        </div>

                        <div class="payment-option">
                            <input type="radio" name="payment_method" value="ewallet" id="ewallet"
                                   {{ old('payment_method') == 'ewallet' ? 'checked' : '' }}>
                            <label for="ewallet" class="payment-label">
                                <div class="payment-icon">📱</div>
                                <div class="payment-name">E-Wallet</div>
                            </label>
                        </div>
                    </div>

                    @error('payment_method')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ===== ORDER SUMMARY ===== -->
            <div class="col-lg-5">
                <div class="order-summary">
                    <h3 class="section-title">
                        <i class="fas fa-receipt"></i> Ringkasan Pesanan
                    </h3>

                    @foreach($carts as $cart)
                        <div class="order-item">
                            <div class="order-item-header">
                                <div class="order-item-icon">{{ $cart->product->category->icon }}</div>
                                <div class="order-item-name">{{ $cart->product->name }}</div>
                            </div>
                            <div class="order-item-details">
                                <span class="order-item-qty">
                                    {{ $cart->quantity }} {{ $cart->product->unit }} × {{ $cart->product->formatted_price }}
                                </span>
                                <span class="order-item-price">
                                    Rp {{ number_format($cart->subtotal, 0, ',', '.') }}
                                </span>
                            </div>
                        </div>
                    @endforeach

                    <div class="summary-divider"></div>

                    <div class="summary-row">
                        <span class="summary-label">
                            <i class="fas fa-shopping-bag me-2"></i>Total Produk
                        </span>
                        <span class="summary-value">{{ $carts->count() }} item</span>
                    </div>

                    <div class="summary-row">
                        <span class="summary-label">
                            <i class="fas fa-boxes me-2"></i>Total Barang
                        </span>
                        <span class="summary-value">{{ $carts->sum('quantity') }} unit</span>
                    </div>

                    <div class="summary-total">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="summary-label">Total Pembayaran</span>
                            <span class="summary-value">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-place-order">
                        <i class="fas fa-check-circle me-2"></i> Buat Pesanan
                    </button>

                    <a href="{{ route('cart.index') }}" class="btn btn-place-order btn-back">
                        <i class="fas fa-arrow-left me-2"></i> Kembali ke Keranjang
                    </a>

                    <div class="alert alert-info mt-3 mb-0">
                        <i class="fas fa-info-circle me-2"></i>
                        <small>Dengan melanjutkan, Anda menyetujui syarat dan ketentuan Protani Indonesia</small>
                    </div>
                </div>
            </div>
        </div>
    </form>

</x-layout>
