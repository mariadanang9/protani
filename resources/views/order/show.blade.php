<x-layout>
    <x-slot:title>Detail Pesanan #{{ $order->id }}</x-slot:title>

    <div class="order-detail-header mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fw-bold">📦 Detail Pesanan #{{ $order->id }}</h1>
                <p class="text-muted mb-0">Dibuat pada: {{ $order->created_at->format('d M Y, H:i') }}</p>
            </div>
            <div>
                {!! $order->status_badge !!}
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Order Items -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">🛍️ Produk yang Dibeli</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->orderItems as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="product-icon me-3">
                                                    {{ $item->product->category->icon }}
                                                </div>
                                                <div>
                                                    <strong>{{ $item->product->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $item->product->category->name }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $item->formatted_price }}
                                            <br>
                                            <small class="text-muted">per {{ $item->product->unit }}</small>
                                        </td>
                                        <td class="text-center">
                                            <strong>{{ $item->quantity }}</strong> {{ $item->product->unit }}
                                        </td>
                                        <td class="text-end">
                                            <strong class="text-success">{{ $item->formatted_subtotal }}</strong>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-light">
                                <tr>
                                    <td colspan="3" class="text-end fw-bold">Total Pembayaran:</td>
                                    <td class="text-end">
                                        <h4 class="mb-0 text-success fw-bold">{{ $order->formatted_total }}</h4>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Information -->
        <div class="col-lg-4">
            <!-- Customer Info -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">👤 Informasi Pembeli</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Nama:</small>
                        <strong>{{ $order->user->name }}</strong>
                    </div>
                    <div class="mb-3">
                        <small class="text-muted d-block mb-1">Email:</small>
                        <strong>{{ $order->user->email }}</strong>
                    </div>
                    @if($order->user->phone)
                    <div>
                        <small class="text-muted d-block mb-1">Telepon:</small>
                        <strong>{{ $order->user->phone }}</strong>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Shipping Info -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">📍 Alamat Pengiriman</h6>
                </div>
                <div class="card-body">
                    <p class="mb-0">{{ $order->shipping_address }}</p>
                </div>
            </div>

            <!-- Payment Info -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">💰 Metode Pembayaran</h6>
                </div>
                <div class="card-body">
                    <div class="payment-info text-center py-3">
                        <div class="payment-icon-large mb-2">
                            @if($order->payment_method === 'transfer')
                                🏦
                            @elseif($order->payment_method === 'cod')
                                💵
                            @else
                                📱
                            @endif
                        </div>
                        <strong>{{ $order->payment_method_label }}</strong>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-grid gap-2">
                <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
                    ← Kembali ke Riwayat
                </a>
                @if($order->status === 'pending')
                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                          onsubmit="return confirm('Yakin ingin membatalkan pesanan ini? Stok produk akan dikembalikan.')">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">
                            🚫 Batalkan Pesanan
                        </button>
                    </form>
                @endif
                <a href="{{ route('products') }}" class="btn btn-success">
                    🌾 Belanja Lagi
                </a>
            </div>
        </div>
    </div>

    <style>
        .order-detail-header {
            animation: fadeIn 0.5s ease;
        }

        .product-icon {
            font-size: 2.5rem;
        }

        .payment-icon-large {
            font-size: 3rem;
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

        .card {
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
    </style>
</x-layout>
