<x-layout>
    <x-slot:title>Tentang Kami - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .about-hero {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 4rem 2rem;
            margin-bottom: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-hero::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            top: -100px;
            right: -100px;
            animation: float 20s infinite ease-in-out;
        }

        @keyframes float {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(-30px, 30px); }
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            opacity: 0.95;
            position: relative;
            z-index: 1;
        }

        .hero-logo {
            font-size: 5rem;
            margin-bottom: 1rem;
            animation: bounceIn 1s ease;
        }

        @keyframes bounceIn {
            0% { transform: scale(0); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* ===== CONTENT SECTIONS ===== */
        .content-section {
            background: white;
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .content-section:nth-child(1) { animation-delay: 0.1s; }
        .content-section:nth-child(2) { animation-delay: 0.2s; }
        .content-section:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            font-size: 2rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-icon {
            font-size: 2.5rem;
        }

        .section-content {
            color: #495057;
            line-height: 1.8;
            font-size: 1.1rem;
        }

        /* ===== VALUE CARDS ===== */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .value-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .value-card:hover {
            transform: translateY(-10px);
            border-color: #6b8e23;
            box-shadow: 0 10px 30px rgba(107, 142, 35, 0.2);
        }

        .value-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .value-card:hover .value-icon {
            transform: scale(1.2) rotate(5deg);
        }

        .value-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.5rem;
        }

        .value-description {
            color: #6c757d;
            font-size: 0.95rem;
        }

        /* ===== TEAM SECTION ===== */
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-card {
            text-align: center;
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-avatar {
            width: 150px;
            height: 150px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
            transition: all 0.3s ease;
        }

        .team-card:hover .team-avatar {
            transform: scale(1.1) rotate(5deg);
        }

        .team-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.25rem;
        }

        .team-role {
            color: #6b8e23;
            font-weight: 600;
        }

        /* ===== STATS SECTION ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            color: white;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(45, 80, 22, 0.3);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.95;
        }

        /* ===== CTA SECTION ===== */
        .cta-section {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            color: white;
            animation: fadeInUp 0.6s ease 0.4s both;
        }

        .cta-title {
            font-size: 2rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .btn-cta {
            padding: 1rem 2.5rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .btn-light-cta {
            background: white;
            color: #2d5016;
            border: none;
        }

        .btn-light-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(255, 255, 255, 0.3);
        }

        .btn-outline-cta {
            background: transparent;
            color: white;
            border: 2px solid white;
        }

        .btn-outline-cta:hover {
            background: white;
            color: #2d5016;
            transform: translateY(-3px);
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .values-grid,
            .team-grid,
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

    <!-- ===== HERO SECTION ===== -->
    <div class="about-hero">
        <div class="hero-logo">🌾</div>
        <h1 class="hero-title">Tentang Protani Indonesia</h1>
        <p class="hero-subtitle">Menghubungkan Petani dengan Konsumen untuk Pertanian yang Lebih Baik</p>
    </div>

    <!-- ===== MISSION & VISION ===== -->
    <div class="content-section">
        <h2 class="section-title">
            <span class="section-icon">🎯</span> Misi & Visi Kami
        </h2>
        <div class="section-content">
            <p class="mb-4">
                <strong>Protani Indonesia</strong> adalah platform e-commerce yang berdedikasi untuk mendukung petani lokal dan menyediakan akses mudah ke produk pertanian berkualitas tinggi. Kami percaya bahwa dengan teknologi, kita dapat menciptakan ekosistem pertanian yang lebih adil dan berkelanjutan.
            </p>
            <p class="mb-4">
                <strong>Visi Kami:</strong> Menjadi platform terdepan yang menghubungkan petani Indonesia dengan konsumen, menciptakan nilai tambah untuk semua pihak, dan berkontribusi pada ketahanan pangan nasional.
            </p>
            <p class="mb-0">
                <strong>Misi Kami:</strong> Memberdayakan petani lokal dengan memberikan akses langsung ke pasar, meningkatkan pendapatan mereka, dan memastikan konsumen mendapatkan produk segar dan berkualitas dengan harga yang adil.
            </p>
        </div>
    </div>

    <!-- ===== VALUES ===== -->
    <div class="content-section">
        <h2 class="section-title">
            <span class="section-icon">💚</span> Nilai-Nilai Kami
        </h2>
        <div class="values-grid">
            <div class="value-card">
                <div class="value-icon">🌱</div>
                <h3 class="value-title">Keberlanjutan</h3>
                <p class="value-description">Mendukung praktik pertanian berkelanjutan untuk masa depan yang lebih hijau</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🤝</div>
                <h3 class="value-title">Keadilan</h3>
                <p class="value-description">Harga yang adil untuk petani dan konsumen tanpa perantara yang tidak perlu</p>
            </div>
            <div class="value-card">
                <div class="value-icon">✨</div>
                <h3 class="value-title">Kualitas</h3>
                <p class="value-description">Produk berkualitas tinggi langsung dari sumber terpercaya</p>
            </div>
            <div class="value-card">
                <div class="value-icon">🔒</div>
                <h3 class="value-title">Kepercayaan</h3>
                <p class="value-description">Transparansi dan kejujuran dalam setiap transaksi</p>
            </div>
        </div>
    </div>

    <!-- ===== STATISTICS ===== -->
    <div class="content-section">
        <h2 class="section-title">
            <span class="section-icon">📊</span> Pencapaian Kami
        </h2>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">100+</div>
                <div class="stat-label">Petani Mitra</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">500+</div>
                <div class="stat-label">Produk Tersedia</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1000+</div>
                <div class="stat-label">Pelanggan Puas</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">100%</div>
                <div class="stat-label">Produk Lokal</div>
            </div>
        </div>
    </div>

    <!-- ===== TECHNOLOGY ===== -->
    <div class="content-section">
        <h2 class="section-title">
            <span class="section-icon">🤖</span> Teknologi Kami
        </h2>
        <div class="section-content">
            <p class="mb-3">
                Protani Indonesia menggunakan teknologi terkini untuk memberikan pengalaman terbaik:
            </p>
            <ul style="line-height: 2;">
                <li><strong>AI Recommendation System</strong> - Rekomendasi produk yang personal berdasarkan preferensi Anda</li>
                <li><strong>Smart Search</strong> - Pencarian cepat dan akurat dengan filter canggih</li>
                <li><strong>Real-time Inventory</strong> - Informasi stok produk yang selalu update</li>
                <li><strong>Review & Rating System</strong> - Transparansi kualitas dari pengguna nyata</li>
                <li><strong>Secure Payment</strong> - Sistem pembayaran yang aman dan terpercaya</li>
            </ul>
        </div>
    </div>

    <!-- ===== CTA SECTION ===== -->
    <div class="cta-section">
        <h2 class="cta-title">Bergabunglah dengan Gerakan Pertanian Modern!</h2>
        <p class="fs-5 mb-4">Dukung petani lokal dan nikmati produk berkualitas tinggi</p>
        <div class="cta-buttons">
            <a href="{{ route('products') }}" class="btn btn-cta btn-light-cta">
                <i class="fas fa-shopping-bag me-2"></i> Mulai Belanja
            </a>
            <a href="{{ route('contact') }}" class="btn btn-cta btn-outline-cta">
                <i class="fas fa-envelope me-2"></i> Hubungi Kami
            </a>
        </div>
    </div>

</x-layout>
