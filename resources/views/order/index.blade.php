<x-layout>
    <x-slot:title>Riwayat Pesanan</x-slot:title>

    <x-breadcrumb :items="[
        ['label' => 'Pesanan Saya', 'url' => '#']
    ]" />

    <div class="orders-header mb-4">
        <h1 class="fw-bold">📦 Riwayat Pesanan</h1>
        <p class="text-muted">Lihat semua pesanan yang pernah Anda buat</p>
    </div>

    @if($orders->isEmpty())
        <div class="empty-orders text-center py-5">
            <div class="empty-icon mb-4">📦</div>
            <h3 class="mb-3">Belum Ada Pesanan</h3>
            <p class="text-muted mb-4">Anda belum pernah melakukan pembelian</p>
            <a href="{{ route('products') }}" class="btn btn-success btn-lg">
                🌾 Mulai Belanja
            </a>
        </div>
    @else
        <div class="row">
            @foreach($orders as $order)
                <div class="col-12 mb-3">
                    <div class="card shadow-sm border-0 order-card">
                        <div class="card-body p-4">
                            <div class="row align-items-center">
                                <!-- Order Info -->
                                <div class="col-md-6 mb-3 mb-md-0">
                                    <div class="d-flex align-items-start">
                                        <div class="order-icon me-3">📦</div>
                                        <div>
                                            <h5 class="mb-1">Order #{{ $order->id }}</h5>
                                            <p class="text-muted mb-2">
                                                <small>
                                                    📅 {{ $order->created_at->format('d M Y, H:i') }}
                                                </small>
                                            </p>
                                            <div class="mb-2">
                                                {!! $order->status_badge !!}
                                            </div>
                                            <p class="mb-0">
                                                <strong>{{ $order->orderItems->count() }} produk</strong> •
                                                <span class="text-success fw-bold">{{ $order->formatted_total }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Payment & Shipping Info -->
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="info-section">
                                        <small class="text-muted d-block mb-1">💰 Pembayaran:</small>
                                        <strong>{{ $order->payment_method_label }}</strong>

                                        <small class="text-muted d-block mt-2 mb-1">📍 Pengiriman:</small>
                                        <small>{{ Str::limit($order->shipping_address, 50) }}</small>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="col-md-2 text-end">
                                    <a href="{{ route('orders.show', $order->id) }}"
                                       class="btn btn-success w-100 mb-2">
                                        Lihat Detail
                                    </a>
                                    @if($order->status === 'pending')
                                        <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                                              onsubmit="return confirm('Yakin ingin membatalkan pesanan ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                                                Batalkan
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    @endif

    <style>
        .orders-header {
            animation: fadeIn 0.5s ease;
        }

        .empty-orders {
            animation: fadeIn 0.8s ease;
        }

        .empty-icon {
            font-size: 5rem;
            animation: bounce 2s infinite;
        }

        .order-card {
            transition: all 0.3s ease;
        }

        .order-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1) !important;
        }

        .order-icon {
            font-size: 2.5rem;
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

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
    </style>
</x-layout>
