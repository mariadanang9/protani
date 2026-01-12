<x-layout>
    <x-slot:title>Hubungi Kami - Protani Indonesia</x-slot:title>

    <style>
        /* ===== PAGE HEADER ===== */
        .contact-hero {
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

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
        }

        /* ===== CONTACT CARDS ===== */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .contact-card {
            background: white;
            border-radius: 16px;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            border: 2px solid transparent;
            animation: fadeInUp 0.6s ease;
            animation-fill-mode: both;
        }

        .contact-card:nth-child(1) { animation-delay: 0.1s; }
        .contact-card:nth-child(2) { animation-delay: 0.2s; }
        .contact-card:nth-child(3) { animation-delay: 0.3s; }
        .contact-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-card:hover {
            transform: translateY(-10px);
            border-color: #6b8e23;
            box-shadow: 0 15px 40px rgba(107, 142, 35, 0.2);
        }

        .contact-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: white;
            transition: all 0.3s ease;
        }

        .contact-card:hover .contact-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .contact-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 0.75rem;
        }

        .contact-info {
            color: #6c757d;
            font-size: 1.05rem;
            margin-bottom: 1rem;
        }

        .contact-link {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            background: linear-gradient(135deg, #2d5016, #6b8e23);
            color: white;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .contact-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(45, 80, 22, 0.3);
            color: white;
        }

        /* ===== MAP SECTION ===== */
        .map-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            margin-bottom: 3rem;
            animation: fadeInUp 0.6s ease 0.5s both;
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

        .map-placeholder {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 1rem;
            border: 3px dashed #6b8e23;
        }

        .map-icon {
            font-size: 5rem;
            opacity: 0.3;
        }

        /* ===== SOCIAL MEDIA ===== */
        .social-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            border-radius: 20px;
            padding: 3rem 2rem;
            text-align: center;
            animation: fadeInUp 0.6s ease 0.6s both;
        }

        .social-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
            margin-top: 2rem;
        }

        .social-link {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            transition: all 0.3s ease;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .social-link.facebook {
            color: #1877f2;
        }

        .social-link.instagram {
            color: #e4405f;
        }

        .social-link.twitter {
            color: #1da1f2;
        }

        .social-link.whatsapp {
            color: #25d366;
        }

        .social-link.youtube {
            color: #ff0000;
        }

        .social-link.tiktok {
            color: #000000;
        }

        .social-link:hover {
            transform: translateY(-10px) scale(1.1);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        /* ===== OFFICE HOURS ===== */
        .hours-section {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            animation: fadeInUp 0.6s ease 0.7s both;
        }

        .hours-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .hours-item {
            display: flex;
            justify-content: space-between;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 12px;
            border-left: 4px solid #6b8e23;
        }

        .day {
            font-weight: 700;
            color: #2d5016;
        }

        .time {
            color: #6c757d;
        }

        .time.closed {
            color: #dc3545;
            font-weight: 600;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .map-placeholder {
                height: 300px;
            }

            .social-links {
                gap: 1rem;
            }

            .social-link {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }
    </style>

    <!-- ===== HERO SECTION ===== -->
    <div class="contact-hero">
        <h1 class="hero-title">
            <i class="fas fa-envelope me-2"></i> Hubungi Kami
        </h1>
        <p class="hero-subtitle">Kami Siap Membantu Anda!</p>
    </div>

    <!-- ===== CONTACT CARDS ===== -->
    <div class="contact-grid">
        <div class="contact-card">
            <div class="contact-icon">
                <i class="fas fa-envelope"></i>
            </div>
            <h3 class="contact-title">Email</h3>
            <p class="contact-info">info@protani.id<br>support@protani.id</p>
            <a href="mailto:info@protani.id" class="contact-link">
                <i class="fas fa-paper-plane me-2"></i> Kirim Email
            </a>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <i class="fas fa-phone"></i>
            </div>
            <h3 class="contact-title">Telepon</h3>
            <p class="contact-info">+62 812-3456-7890<br>Senin - Jumat: 08:00 - 17:00</p>
            <a href="tel:+6281234567890" class="contact-link">
                <i class="fas fa-phone-alt me-2"></i> Hubungi
            </a>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <i class="fab fa-whatsapp"></i>
            </div>
            <h3 class="contact-title">WhatsApp</h3>
            <p class="contact-info">+62 812-3456-7890<br>Respon Cepat 24/7</p>
            <a href="https://wa.me/6281234567890" target="_blank" class="contact-link">
                <i class="fab fa-whatsapp me-2"></i> Chat WA
            </a>
        </div>

        <div class="contact-card">
            <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
            </div>
            <h3 class="contact-title">Alamat</h3>
            <p class="contact-info">Jl. Pertanian No. 123<br>Jakarta Selatan, 12345</p>
            <a href="https://maps.google.com" target="_blank" class="contact-link">
                <i class="fas fa-directions me-2"></i> Lihat Peta
            </a>
        </div>
    </div>

    <!-- ===== MAP SECTION ===== -->
    <div class="map-section">
        <h2 class="section-title">
            <i class="fas fa-map-marked-alt me-2"></i> Lokasi Kami
        </h2>
        <div class="map-placeholder">
            <div class="map-icon">📍</div>
            <p class="text-muted fw-semibold">Jl. Pertanian No. 123, Jakarta Selatan</p>
            <p class="text-muted">Peta interaktif akan ditampilkan di sini</p>
        </div>
    </div>

    <!-- ===== OFFICE HOURS ===== -->
    <div class="hours-section">
        <h2 class="section-title">
            <i class="fas fa-clock me-2"></i> Jam Operasional
        </h2>
        <div class="hours-grid">
            <div class="hours-item">
                <span class="day">Senin - Jumat</span>
                <span class="time">08:00 - 17:00 WIB</span>
            </div>
            <div class="hours-item">
                <span class="day">Sabtu</span>
                <span class="time">09:00 - 15:00 WIB</span>
            </div>
            <div class="hours-item">
                <span class="day">Minggu</span>
                <span class="time closed">Tutup</span>
            </div>
            <div class="hours-item">
                <span class="day">WhatsApp Support</span>
                <span class="time">24/7 Online</span>
            </div>
        </div>
    </div>

    <!-- ===== SOCIAL MEDIA ===== -->
    <div class="social-section">
        <h2 class="social-title">
            <i class="fas fa-share-alt me-2"></i> Ikuti Kami di Media Sosial
        </h2>
        <p class="text-muted">Dapatkan update terbaru, promo, dan tips pertanian</p>

        <div class="social-links">
            <a href="https://facebook.com/protani" target="_blank" class="social-link facebook" title="Facebook">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://instagram.com/protani" target="_blank" class="social-link instagram" title="Instagram">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://twitter.com/protani" target="_blank" class="social-link twitter" title="Twitter">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://wa.me/6281234567890" target="_blank" class="social-link whatsapp" title="WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://youtube.com/protani" target="_blank" class="social-link youtube" title="YouTube">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="https://tiktok.com/@protani" target="_blank" class="social-link tiktok" title="TikTok">
                <i class="fab fa-tiktok"></i>
            </a>
        </div>
    </div>

</x-layout>
