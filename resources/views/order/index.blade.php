<x-layout>
    <x-slot:title>Pesanan Saya - Protani Indonesia</x-slot:title>

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

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
        }

        /* ===== ORDER CARDS ===== */
        .order-card {
            background: white;
            border-radius: 16px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .order-card:nth-child(1) { animation-delay: 0.1s; }
        .order-card:nth-child(2) { animation-delay: 0.15s; }
        .order-card:nth-child(3) { animation-delay: 0.2s; }
        .order-card:nth-child(4) { animation-delay: 0.25s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .order-card:hover {
            border-color: #6b8e23;
            box-shadow: 0 8px 25px rgba(45, 80, 22, 0.15);
            transform: translateY(-3px);
        }

        .order-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding-bottom: 1rem;
            border-bottom: 2px dashed #e9ecef;
            margin-bottom: 1rem;
        }

        .order-id {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d5016;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .order-date {
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }

        /* ===== STATUS BADGES ===== */
        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-weight: 700;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .status-pending {
            background: linear-gradient(135deg, #ffc107, #ffb300);
            color: white;
        }

        .status-processing {
            background: linear-gradient(135deg, #17a2b8, #138496);
            color: white;
        }

        .status-completed {
            background: linear-gradient(135deg, #28a745, #218838);
            color: white;
        }

        .status-cancelled {
            background: linear-gradient(135deg, #dc3545, #c82333);
            color: white;
        }

        /* ===== ORDER BODY ===== */
        .order-items-preview {
            margin-bottom: 1rem;
        }

        .order-item-preview {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            background: #f8f9fa;
            border-radius: 10px;
            margin-bottom: 0.5rem;
            transition: all 0.3s ease;
        }

        .order-item-preview:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }

        .item-icon {
            font-size: 2rem;
        }

        .item-info {
            flex: 1;
        }

        .item-name {
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.25rem;
        }

        .item-qty {
            color: #6c757d;
            font-size: 0.9rem;
        }

        /* ===== ORDER FOOTER ===== */
        .order-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 2px dashed #e9ecef;
        }

        .order-total {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .total-label {
            color: #6c757d;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .total-amount {
            font-size: 1.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .order-actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-detail {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
            padding: 0.6rem 1.5rem;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
        }

        /* ===== EMPTY STATE ===== */
        .empty-state {
            background: white;
            border-radius: 20px;
            padding: 4rem 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
        }

        .empty-icon {
            font-size: 6rem;
            margin-bottom: 1.5rem;
            opacity: 0.3;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }

        .empty-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .order-header {
                flex-direction: column;
                gap: 1rem;
            }

            .order-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: stretch;
            }

            .order-actions {
                flex-direction: column;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-box me-2"></i> Pesanan Saya
        </h1>
        <p class="mb-0 fs-5">Kelola dan pantau status pesanan Anda</p>
    </div>

    @if($orders->isEmpty())
        <!-- ===== EMPTY STATE ===== -->
        <div class="empty-state">
            <div class="empty-icon">📦</div>
            <h2 class="empty-title">Belum Ada Pesanan</h2>
            <p class="text-muted fs-5 mb-4">Anda belum memiliki riwayat pesanan. Mulai belanja sekarang!</p>
            <a href="{{ route('products') }}" class="btn btn-detail btn-lg">
                <i class="fas fa-shopping-bag me-2"></i> Mulai Belanja
            </a>
        </div>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <!-- Order Header -->
                <div class="order-header">
                    <div>
                        <div class="order-id">
                            <i class="fas fa-receipt"></i>
                            Order #{{ $order->id }}
                        </div>
                        <div class="order-date">
                            <i class="far fa-calendar-alt me-1"></i>
                            {{ $order->created_at->format('d M Y, H:i') }}
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
                        <span class="status-badge {{ $statusClass }}">
                            <i class="fas {{ $statusIcon }} me-1"></i>
                            {{ $statusText }}
                        </span>
                    </div>
                </div>

                <!-- Order Items Preview -->
                <div class="order-items-preview">
                    @foreach($order->orderItems->take(3) as $item)
                        <div class="order-item-preview">
                            <div class="item-icon">{{ $item->product->category->icon }}</div>
                            <div class="item-info">
                                <div class="item-name">{{ $item->product->name }}</div>
                                <div class="item-qty">
                                    {{ $item->quantity }} {{ $item->product->unit }} × {{ $item->formatted_price }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if($order->orderItems->count() > 3)
                        <div class="text-muted small ms-3">
                            <i class="fas fa-plus-circle me-1"></i>
                            +{{ $order->orderItems->count() - 3 }} produk lainnya
                        </div>
                    @endif
                </div>

                <!-- Order Footer -->
                <div class="order-footer">
                    <div class="order-total">
                        <span class="total-label">Total Pembayaran</span>
                        <span class="total-amount">{{ $order->formatted_total }}</span>
                    </div>
                    <div class="order-actions">
                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-detail">
                            <i class="fas fa-eye me-2"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links() }}
        </div>
    @endif

</x-layout>
