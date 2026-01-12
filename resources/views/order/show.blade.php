<x-layout>
    <x-slot:title>Detail Pesanan #{{ $order->id }} - Protani Indonesia</x-slot:title>

    <style>
        /* ===== BREADCRUMB ===== */
        .breadcrumb-custom {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            animation: fadeInDown 0.5s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== ORDER HEADER ===== */
        .order-header-card {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            color: white;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .order-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        .order-meta {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            margin-top: 1rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* ===== STATUS BADGES ===== */
        .status-badge-large {
            padding: 0.75rem 1.5rem;
            border-radius: 25px;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        .status-pending { background: linear-gradient(135deg, #ffc107, #ffb300); }
        .status-processing { background: linear-gradient(135deg, #17a2b8, #138496); }
        .status-completed { background: linear-gradient(135deg, #28a745, #218838); }
        .status-cancelled { background: linear-gradient(135deg, #dc3545, #c82333); }

        /* ===== ORDER DETAILS SECTION ===== */
        .details-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            margin-bottom: 1.5rem;
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

        .detail-row {
            display: flex;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
        }

        .detail-row:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .detail-label {
            font-weight: 600;
            color: #6c757d;
            min-width: 150px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .detail-value {
            color: #2d5016;
            font-weight: 700;
        }

        /* ===== ORDER ITEMS ===== */
        .order-items-section {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            animation: fadeInRight 0.6s ease;
        }

        @keyframes fadeInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        .order-item {
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 12px;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .order-item:hover {
            background: #e9ecef;
            border-color: #6b8e23;
            transform: translateX(5px);
        }

        .item-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .item-icon {
            font-size: 3rem;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.25rem;
        }

        .item-category {
            color: #6b8e23;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .item-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 1rem;
            padding: 1rem;
            background: white;
            border-radius: 10px;
        }

        .item-detail {
            display: flex;
            flex-direction: column;
        }

        .item-detail-label {
            color: #6c757d;
            font-size: 0.85rem;
            margin-bottom: 0.25rem;
        }

        .item-detail-value {
            font-weight: 700;
            color: #2d5016;
            font-size: 1.1rem;
        }

        /* ===== SUMMARY ===== */
        .summary-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 16px;
            padding: 2rem;
            margin-top: 1.5rem;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px dashed #dee2e6;
        }

        .summary-row:last-child {
            border-bottom: none;
        }

        .summary-total {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            margin-top: 1rem;
        }

        .total-label {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d5016;
        }

        .total-amount {
            font-size: 2.5rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-action {
            flex: 1;
            padding: 1rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-primary-action {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
        }

        .btn-primary-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.3);
        }

        .btn-danger-action {
            background: white;
            color: #dc3545;
            border: 2px solid #dc3545;
        }

        .btn-danger-action:hover {
            background: #dc3545;
            color: white;
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .order-title {
                font-size: 1.5rem;
            }

            .order-meta {
                gap: 1rem;
            }

            .detail-row {
                flex-direction: column;
                gap: 0.5rem;
            }

            .detail-label {
                min-width: auto;
            }

            .item-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons {
                flex-direction: column;
            }
        }
    </style>

    <!-- ===== BREADCRUMB ===== -->
    <nav class="breadcrumb-custom">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Pesanan Saya</a></li>
            <li class="breadcrumb-item active">Order #{{ $order->id }}</li>
        </ol>
    </nav>

    <!-- ===== ORDER HEADER ===== -->
    <div class="order-header-card">
        <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">
            <div>
                <h1 class="order-title">
                    <i class="fas fa-receipt me-2"></i>
                    Order #{{ $order->id }}
                </h1>
                <div class="order-meta">
                    <div class="meta-item">
                        <i class="far fa-calendar-alt"></i>
                        <span>{{ $order->created_at->format('d M Y, H:i') }}</span>
                    </div>
                    <div class="meta-item">
                        <i class="fas fa-boxes"></i>
                        <span>{{ $order->orderItems->count() }} Produk</span>
                    </div>
                </div>
            </div>
            <div>
                @php
                    $statusClass = match($order->status) {
                        'pending' => 'status-pending',
                        'processing' => 'status-processing',
                        'completed' => 'status-completed',
                        'cancelled' => 'status-cancelled',
                        default => 'status-pending'
                    };
                    $statusText = match($order->status) {
                        'pending' => 'Menunggu',
                        'processing' => 'Diproses',
                        'completed' => 'Selesai',
                        'cancelled' => 'Dibatalkan',
                        default => $order->status
                    };
                    $statusIcon = match($order->status) {
                        'pending' => 'fa-clock',
                        'processing' => 'fa-spinner',
                        'completed' => 'fa-check-circle',
                        'cancelled' => 'fa-times-circle',
                        default => 'fa-question'
                    };
                @endphp
                <span class="status-badge-large {{ $statusClass }}">
                    <i class="fas {{ $statusIcon }}"></i>
                    {{ $statusText }}
                </span>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- ===== ORDER DETAILS ===== -->
        <div class="col-lg-5 mb-4 mb-lg-0">
            <div class="details-section">
                <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> Informasi Pesanan
                </h3>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-map-marker-alt"></i>
                        Alamat Pengiriman
                    </div>
                    <div class="detail-value">{{ $order->shipping_address }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-credit-card"></i>
                        Metode Pembayaran
                    </div>
                    <div class="detail-value">{{ $order->payment_method_label }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="fas fa-tag"></i>
                        Status Pesanan
                    </div>
                    <div class="detail-value">{{ $statusText }}</div>
                </div>
            </div>

            <!-- Cancel Button -->
            @if($order->status === 'pending')
                <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin membatalkan pesanan ini? Stok produk akan dikembalikan.')">
                    @csrf
                    <button type="submit" class="btn btn-action btn-danger-action w-100">
                        <i class="fas fa-times-circle me-2"></i> Batalkan Pesanan
                    </button>
                </form>
            @endif
        </div>

        <!-- ===== ORDER ITEMS ===== -->
        <div class="col-lg-7">
            <div class="order-items-section">
                <h3 class="section-title">
                    <i class="fas fa-box-open"></i> Produk yang Dipesan
                </h3>

                @foreach($order->orderItems as $item)
                    <div class="order-item">
                        <div class="item-header">
                            <div class="item-icon">{{ $item->product->category->icon }}</div>
                            <div class="item-info">
                                <div class="item-name">{{ $item->product->name }}</div>
                                <div class="item-category">{{ $item->product->category->name }}</div>
                            </div>
                        </div>

                        <div class="item-details">
                            <div class="item-detail">
                                <span class="item-detail-label">Harga Satuan</span>
                                <span class="item-detail-value">{{ $item->formatted_price }}</span>
                            </div>
                            <div class="item-detail">
                                <span class="item-detail-label">Jumlah</span>
                                <span class="item-detail-value">{{ $item->quantity }} {{ $item->product->unit }}</span>
                            </div>
                            <div class="item-detail">
                                <span class="item-detail-label">Subtotal</span>
                                <span class="item-detail-value">{{ $item->formatted_subtotal }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Summary -->
                <div class="summary-card">
                    <div class="summary-row">
                        <span>Total Produk</span>
                        <strong>{{ $order->orderItems->count() }} item</strong>
                    </div>
                    <div class="summary-row">
                        <span>Total Barang</span>
                        <strong>{{ $order->orderItems->sum('quantity') }} unit</strong>
                    </div>

                    <div class="summary-total">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="total-label">Total Pembayaran</span>
                            <span class="total-amount">{{ $order->formatted_total }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== ACTION BUTTONS ===== -->
    <div class="action-buttons mt-4">
        <a href="{{ route('orders.index') }}" class="btn btn-action btn-primary-action">
            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Pesanan
        </a>
        <a href="{{ route('products') }}" class="btn btn-action btn-primary-action">
            <i class="fas fa-shopping-bag me-2"></i> Lanjut Belanja
        </a>
    </div>

</x-layout>
