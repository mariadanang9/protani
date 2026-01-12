<x-layout>
    <x-slot:title>FAQ - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .page-header {
            background: linear-gradient(135deg, #2d5016, #4a7c2c);
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 3rem;
            color: white;
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.2);
            text-align: center;
            animation: fadeInDown 0.6s ease;
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .page-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .page-subtitle {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* ===== FAQ SECTIONS ===== */
        .faq-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .faq-section:nth-child(1) { animation-delay: 0.1s; }
        .faq-section:nth-child(2) { animation-delay: 0.2s; }
        .faq-section:nth-child(3) { animation-delay: 0.3s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .section-icon {
            font-size: 2rem;
        }

        /* ===== ACCORDION STYLES ===== */
        .faq-accordion {
            border: none;
        }

        .accordion-item {
            border: 2px solid #e9ecef;
            border-radius: 12px !important;
            margin-bottom: 1rem;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .accordion-item:hover {
            border-color: #6b8e23;
            box-shadow: 0 4px 15px rgba(107, 142, 35, 0.1);
        }

        .accordion-button {
            background: #f8f9fa;
            color: #2d5016;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 1.25rem 1.5rem;
            border: none;
            transition: all 0.3s ease;
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            box-shadow: none;
        }

        .accordion-button:focus {
            box-shadow: none;
            border: none;
        }

        .accordion-button::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232d5016'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            transition: transform 0.3s ease;
        }

        .accordion-button:not(.collapsed)::after {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='white'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
        }

        .accordion-body {
            padding: 1.5rem;
            color: #495057;
            line-height: 1.8;
            background: white;
        }

        /* ===== CTA SECTION ===== */
        .cta-box {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            border: 3px dashed #6b8e23;
            animation: fadeInUp 0.6s ease 0.4s both;
        }

        .cta-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-cta {
            padding: 0.75rem 2rem;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }

        .btn-primary-cta {
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border: none;
        }

        .btn-primary-cta:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(45, 80, 22, 0.3);
        }

        .btn-secondary-cta {
            background: white;
            color: #6b8e23;
            border: 2px solid #6b8e23;
        }

        .btn-secondary-cta:hover {
            background: #6b8e23;
            color: white;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .section-title {
                font-size: 1.4rem;
            }

            .cta-buttons {
                flex-direction: column;
            }
        }
    </style>

    <!-- ===== PAGE HEADER ===== -->
    <div class="page-header">
        <h1 class="page-title">
            <i class="fas fa-question-circle me-2"></i> FAQ
        </h1>
        <p class="page-subtitle">Pertanyaan yang Sering Diajukan</p>
    </div>

    <!-- ===== FAQ SECTION 1: UMUM ===== -->
    <div class="faq-section">
        <h2 class="section-title">
            <span class="section-icon">🌾</span> Tentang Protani
        </h2>

        <div class="accordion faq-accordion" id="faqGeneral">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        Apa itu Protani Indonesia?
                    </button>
                </h3>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqGeneral">
                    <div class="accordion-body">
                        Protani Indonesia adalah platform e-commerce yang fokus pada produk pertanian lokal. Kami menghubungkan petani dengan konsumen untuk menyediakan produk pertanian berkualitas tinggi dengan harga yang adil. Misi kami adalah mendukung petani lokal dan menghadirkan produk segar langsung dari sumbernya.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                        Apa keunggulan berbelanja di Protani?
                    </button>
                </h3>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqGeneral">
                    <div class="accordion-body">
                        <strong>Keunggulan Protani:</strong>
                        <ul class="mt-2">
                            <li>Produk 100% lokal dari petani Indonesia</li>
                            <li>Kualitas terjamin dan segar</li>
                            <li>Harga langsung dari petani (tanpa perantara)</li>
                            <li>Mendukung ekonomi petani lokal</li>
                            <li>Sistem rekomendasi AI untuk produk yang sesuai</li>
                            <li>Review dan rating dari pembeli nyata</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                        Produk apa saja yang tersedia?
                    </button>
                </h3>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqGeneral">
                    <div class="accordion-body">
                        Protani menyediakan berbagai kategori produk pertanian: Sayuran Segar, Buah-buahan, Biji-bijian, dan Rempah-rempah. Semua produk berasal langsung dari petani lokal Indonesia dengan kualitas terbaik.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FAQ SECTION 2: PEMBELIAN ===== -->
    <div class="faq-section">
        <h2 class="section-title">
            <span class="section-icon">🛒</span> Cara Berbelanja
        </h2>

        <div class="accordion faq-accordion" id="faqShopping">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                        Bagaimana cara membeli produk di Protani?
                    </button>
                </h3>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqShopping">
                    <div class="accordion-body">
                        <strong>Langkah-langkah berbelanja:</strong>
                        <ol class="mt-2">
                            <li><strong>Daftar/Login</strong> - Buat akun atau masuk ke akun Anda</li>
                            <li><strong>Jelajahi Produk</strong> - Lihat katalog produk yang tersedia</li>
                            <li><strong>Tambah ke Keranjang</strong> - Pilih jumlah dan tambahkan ke keranjang</li>
                            <li><strong>Checkout</strong> - Isi alamat pengiriman dan pilih metode pembayaran</li>
                            <li><strong>Konfirmasi</strong> - Review pesanan dan konfirmasi pembayaran</li>
                            <li><strong>Selesai!</strong> - Pesanan Anda akan diproses dan dikirim</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                        Metode pembayaran apa saja yang tersedia?
                    </button>
                </h3>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqShopping">
                    <div class="accordion-body">
                        Kami menyediakan beberapa metode pembayaran:
                        <ul class="mt-2">
                            <li><strong>Transfer Bank</strong> - Transfer ke rekening bank Protani</li>
                            <li><strong>COD (Cash on Delivery)</strong> - Bayar saat barang diterima</li>
                            <li><strong>E-Wallet</strong> - Pembayaran via GoPay, OVO, Dana, dll</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">
                        Apakah bisa membatalkan pesanan?
                    </button>
                </h3>
                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqShopping">
                    <div class="accordion-body">
                        Ya, Anda bisa membatalkan pesanan selama status pesanan masih <strong>"Menunggu"</strong> (belum diproses). Setelah pesanan diproses, pembatalan tidak dapat dilakukan. Stok produk akan dikembalikan otomatis saat pesanan dibatalkan.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq7">
                        Bagaimana cara menggunakan Wishlist?
                    </button>
                </h3>
                <div id="faq7" class="accordion-collapse collapse" data-bs-parent="#faqShopping">
                    <div class="accordion-body">
                        <strong>Fitur Wishlist:</strong> Klik ikon ❤️ (hati) pada produk yang Anda sukai untuk menyimpannya di Wishlist. Anda dapat mengakses Wishlist kapan saja melalui menu navigasi. Dari Wishlist, Anda bisa langsung menambahkan produk ke keranjang atau melihat detail produk.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FAQ SECTION 3: PENGIRIMAN ===== -->
    <div class="faq-section">
        <h2 class="section-title">
            <span class="section-icon">🚚</span> Pengiriman & Pesanan
        </h2>

        <div class="accordion faq-accordion" id="faqShipping">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq8">
                        Berapa lama waktu pengiriman?
                    </button>
                </h3>
                <div id="faq8" class="accordion-collapse collapse" data-bs-parent="#faqShipping">
                    <div class="accordion-body">
                        Waktu pengiriman bervariasi tergantung lokasi:
                        <ul class="mt-2">
                            <li><strong>Jabodetabek:</strong> 1-2 hari kerja</li>
                            <li><strong>Pulau Jawa:</strong> 2-4 hari kerja</li>
                            <li><strong>Luar Jawa:</strong> 4-7 hari kerja</li>
                        </ul>
                        Produk segar kami kemas dengan baik untuk menjaga kualitas selama pengiriman.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq9">
                        Bagaimana cara melacak pesanan saya?
                    </button>
                </h3>
                <div id="faq9" class="accordion-collapse collapse" data-bs-parent="#faqShipping">
                    <div class="accordion-body">
                        Anda dapat melacak pesanan melalui halaman <strong>"Pesanan Saya"</strong> di menu navigasi. Di sana akan terlihat status pesanan Anda: Menunggu, Diproses, Selesai, atau Dibatalkan. Anda juga akan menerima notifikasi email untuk setiap perubahan status pesanan.
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq10">
                        Bagaimana jika produk yang diterima rusak atau tidak sesuai?
                    </button>
                </h3>
                <div id="faq10" class="accordion-collapse collapse" data-bs-parent="#faqShipping">
                    <div class="accordion-body">
                        Jika produk rusak atau tidak sesuai, segera hubungi customer service kami dalam 24 jam setelah penerimaan. Kami akan mengganti produk atau memberikan refund sesuai kebijakan. Pastikan untuk menyertakan foto produk sebagai bukti.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== FAQ SECTION 4: AKUN & FITUR ===== -->
    <div class="faq-section">
        <h2 class="section-title">
            <span class="section-icon">⚙️</span> Akun & Fitur
        </h2>

        <div class="accordion faq-accordion" id="faqAccount">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq11">
                        Bagaimana sistem rekomendasi AI bekerja?
                    </button>
                </h3>
                <div id="faq11" class="accordion-collapse collapse" data-bs-parent="#faqAccount">
                    <div class="accordion-body">
                        <strong>Sistem Rekomendasi AI</strong> kami menganalisis aktivitas Anda seperti produk yang dilihat, ditambahkan ke keranjang, dan dibeli. Berdasarkan preferensi Anda, sistem akan merekomendasikan produk yang sesuai dengan kebutuhan Anda. Semakin sering Anda berbelanja, semakin akurat rekomendasinya!
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq12">
                        Bagaimana cara memberikan review dan rating?
                    </button>
                </h3>
                <div id="faq12" class="accordion-collapse collapse" data-bs-parent="#faqAccount">
                    <div class="accordion-body">
                        Setelah login, buka halaman detail produk yang ingin Anda review. Scroll ke bawah ke bagian <strong>"Review & Rating"</strong>. Pilih rating bintang (1-5) dan tulis komentar Anda. Klik "Kirim Review" untuk mempublikasikan. Review Anda membantu pembeli lain membuat keputusan!
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq13">
                        Apakah data saya aman?
                    </button>
                </h3>
                <div id="faq13" class="accordion-collapse collapse" data-bs-parent="#faqAccount">
                    <div class="accordion-body">
                        Ya, keamanan data Anda adalah prioritas kami. Semua data pribadi dan transaksi dienkripsi dengan teknologi SSL. Kami tidak akan membagikan informasi Anda kepada pihak ketiga tanpa izin Anda. Password Anda juga di-hash dengan algoritma yang aman.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ===== CTA SECTION ===== -->
    <div class="cta-box">
        <h3 class="cta-title">
            <i class="fas fa-question-circle me-2"></i>
            Masih Ada Pertanyaan?
        </h3>
        <p class="text-muted mb-4">Tim kami siap membantu Anda!</p>
        <div class="cta-buttons">
            <a href="{{ route('contact') }}" class="btn btn-cta btn-primary-cta">
                <i class="fas fa-envelope me-2"></i> Hubungi Kami
            </a>
            <a href="{{ route('about') }}" class="btn btn-cta btn-secondary-cta">
                <i class="fas fa-info-circle me-2"></i> Tentang Protani
            </a>
        </div>
    </div>

</x-layout>
