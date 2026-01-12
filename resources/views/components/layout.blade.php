<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Protani Indonesia' }}</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            padding-top: 76px; /* Height of navbar */
        }

        /* ===== NAVBAR STYLES ===== */
        .navbar-custom {
            background: linear-gradient(135deg, #2d5016 0%, #4a7c2c 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            padding: 0.75rem 0;
        }

        .navbar-custom.scrolled {
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            padding: 0.5rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover {
            transform: scale(1.05);
        }

        .navbar-brand img {
            height: 40px;
            transition: transform 0.3s ease;
        }

        .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
            transform: translateY(-2px);
        }

        .nav-link.active {
            background-color: rgba(255,255,255,0.15);
            color: white !important;
        }

        /* Search Bar */
        .search-form {
            position: relative;
            max-width: 400px;
        }

        .search-form input {
            padding: 0.6rem 2.5rem 0.6rem 1rem;
            border-radius: 25px;
            border: 2px solid rgba(255,255,255,0.3);
            background-color: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s ease;
        }

        .search-form input::placeholder {
            color: rgba(255,255,255,0.7);
        }

        .search-form input:focus {
            background-color: white;
            color: #2d5016;
            border-color: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(255,255,255,0.2);
        }

        .search-form input:focus::placeholder {
            color: #999;
        }

        .search-form button {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(255,255,255,0.8);
            padding: 0.4rem 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .search-form input:focus + button {
            color: #2d5016;
        }

        .search-form button:hover {
            color: white;
        }

        /* Cart Badge */
        .cart-link {
            position: relative;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        /* User Dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-dropdown .dropdown-menu {
            border: none;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            border-radius: 12px;
            padding: 0.5rem;
            margin-top: 0.5rem;
            min-width: 200px;
        }

        .user-dropdown .dropdown-item {
            padding: 0.6rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
            transform: translateX(5px);
        }

        .user-dropdown .dropdown-divider {
            margin: 0.5rem 0;
        }

        /* Auth Buttons */
        .btn-auth {
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 2px solid white;
        }

        .btn-login {
            color: white;
            background-color: transparent;
        }

        .btn-login:hover {
            background-color: white;
            color: #2d5016;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255,255,255,0.3);
        }

        .btn-register {
            background-color: white;
            color: #2d5016;
        }

        .btn-register:hover {
            background-color: #f8f9fa;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(255,255,255,0.3);
        }

        /* Mobile Hamburger */
        .navbar-toggler {
            border: 2px solid white;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(255,255,255,0.3);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* ===== FOOTER STYLES ===== */
        .footer-custom {
            background: linear-gradient(135deg, #1a3010 0%, #2d5016 100%);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 5rem;
        }

        .footer-heading {
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            color: #a8e6a1;
        }

        .footer-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            display: block;
            padding: 0.4rem 0;
            transition: all 0.3s ease;
        }

        .footer-link:hover {
            color: white;
            padding-left: 10px;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            color: white;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background-color: white;
            color: #2d5016;
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1.5rem;
            margin-top: 2rem;
            text-align: center;
            color: rgba(255,255,255,0.7);
        }

        /* ===== ALERT MESSAGES ===== */
        .alert-custom {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-custom i {
            font-size: 1.5rem;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991px) {
            .search-form {
                max-width: 100%;
                margin: 1rem 0;
            }

            .navbar-nav {
                padding: 1rem 0;
            }

            .nav-link {
                padding: 0.75rem 1rem !important;
            }

            body {
                padding-top: 66px;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand {
                font-size: 1.2rem;
            }

            .navbar-brand img {
                height: 32px;
            }

            .btn-auth {
                width: 100%;
                margin: 0.25rem 0;
            }
        }
    </style>
</head>
<body>

    <!-- ===== NAVBAR ===== -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" id="mainNavbar">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="{{ asset('images/logo-protani.png') }}" alt="Protani Logo">
                <span>Protani</span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Search Bar (Desktop) -->
                <form action="{{ route('products') }}" method="GET" class="search-form mx-lg-4 d-none d-lg-block">
                    <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>

                <!-- Nav Links -->
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            <i class="fas fa-home me-1"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products*') ? 'active' : '' }}" href="{{ route('products') }}">
                            <i class="fas fa-shopping-bag me-1"></i> Produk
                        </a>
                    </li>

                    @auth
                        <!-- Cart -->
                        <li class="nav-item">
                            <a class="nav-link cart-link {{ request()->routeIs('cart.*') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart me-1"></i> Keranjang
                                @if(Auth::user()->carts->count() > 0)
                                    <span class="cart-badge">{{ Auth::user()->carts->count() }}</span>
                                @endif
                            </a>
                        </li>

                        <!-- User Dropdown -->
                        <li class="nav-item dropdown user-dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('orders.index') }}">
                                        <i class="fas fa-box text-primary"></i> Pesanan Saya
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <!-- Auth Buttons -->
                        <li class="nav-item mx-1">
                            <a href="{{ route('login') }}" class="btn btn-auth btn-login btn-sm">
                                <i class="fas fa-sign-in-alt me-1"></i> Masuk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-auth btn-register btn-sm">
                                <i class="fas fa-user-plus me-1"></i> Daftar
                            </a>
                        </li>
                    @endauth
                </ul>

                <!-- Search Bar (Mobile) -->
                <form action="{{ route('products') }}" method="GET" class="search-form d-lg-none mt-3">
                    <input type="text" name="search" class="form-control" placeholder="Cari produk..." value="{{ request('search') }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </nav>

    <!-- ===== ALERTS ===== -->
    @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success alert-custom alert-dismissible fade show">
                <i class="fas fa-check-circle"></i>
                <div>{{ session('success') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="container mt-3">
            <div class="alert alert-danger alert-custom alert-dismissible fade show">
                <i class="fas fa-exclamation-circle"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    @endif

    <!-- ===== MAIN CONTENT ===== -->
    <main class="container my-4">
        {{ $slot }}
    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row">
                <!-- About -->
                <div class="col-md-4 mb-4">
                    <h5 class="footer-heading">
                        <img src="{{ asset('images/logo-protani.png') }}" alt="Protani" height="30" class="me-2">
                        Protani Indonesia
                    </h5>
                    <p class="text-white-50">Platform e-commerce terpercaya untuk produk pertanian berkualitas. Mendukung petani lokal Indonesia.</p>
                    <div class="social-links mt-3">
                        <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-md-2 mb-4">
                    <h5 class="footer-heading">Menu</h5>
                    <a href="{{ route('home') }}" class="footer-link">Beranda</a>
                    <a href="{{ route('products') }}" class="footer-link">Produk</a>
                    @auth
                        <a href="{{ route('cart.index') }}" class="footer-link">Keranjang</a>
                        <a href="{{ route('orders.index') }}" class="footer-link">Pesanan</a>
                    @endauth
                </div>

                <!-- Categories -->
                <div class="col-md-3 mb-4">
                    <h5 class="footer-heading">Kategori</h5>
                    <a href="{{ route('products') }}?category=1" class="footer-link">Sayuran</a>
                    <a href="{{ route('products') }}?category=2" class="footer-link">Buah-buahan</a>
                    <a href="{{ route('products') }}?category=3" class="footer-link">Biji-bijian</a>
                    <a href="{{ route('products') }}?category=4" class="footer-link">Rempah</a>
                </div>

                <!-- Contact -->
                <div class="col-md-3 mb-4">
                    <h5 class="footer-heading">Kontak</h5>
                    <p class="text-white-50 mb-2">
                        <i class="fas fa-envelope me-2"></i> info@protani.id
                    </p>
                    <p class="text-white-50 mb-2">
                        <i class="fas fa-phone me-2"></i> +62 812-3456-7890
                    </p>
                    <p class="text-white-50 mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia
                    </p>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p class="mb-0">© {{ date('Y') }} Protani Indonesia. Semua hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('mainNavbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Auto-hide alerts after 5 seconds
        setTimeout(function() {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const navbar = document.querySelector('.navbar-collapse');
            const toggler = document.querySelector('.navbar-toggler');

            if (navbar.classList.contains('show') &&
                !navbar.contains(event.target) &&
                !toggler.contains(event.target)) {
                toggler.click();
            }
        });
    </script>

</body>
</html>
