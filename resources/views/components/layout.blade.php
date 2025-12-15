<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Manajemen Produk Pertanian' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2d5016;
            --secondary: #6b8e23;
            --accent: #8fbc8f;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }

        .card {
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .table thead {
            background-color: var(--primary);
            color: white;
        }

        /* Fix Pagination Arrow Icon Size */
        .pagination .page-link svg {
            width: 6px !important;
            height: 6px !important;
            vertical-align: middle;
        }

        .pagination .page-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                🌾 Protani Indonesia
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products') }}">Produk</a>
                    </li>

                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('cart*') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                                🛒 Keranjang
                                @if(auth()->user()->carts()->count() > 0)
                                    <span class="badge bg-danger">{{ auth()->user()->carts()->count() }}</span>
                                @endif
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('orders*') ? 'active' : '' }}" href="{{ route('orders.index') }}">
                                📦 Pesanan
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                                👤 {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">🚪 Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">🔐 Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-light ms-2" href="{{ route('register') }}">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{ $slot }}
    </div>

    <footer class="mt-5 py-4 bg-light">
        <div class="container text-center">
            <p class="mb-0 text-muted">© 2024 Protani Indonesia - Produk Pertanian</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
