<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('img/logo 1.png') }}" type="image/png">
    <title>{{ $title ?? 'Footlane' }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Tambahan Style Khusus Halaman --}}
    {{ $style ?? '' }}

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

    <style>
        :root {
            --primary-color: #ce8600ff;
            --secondary-color: rgba(168, 109, 0, 1)
        }

        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
        }

        .footer {
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
        }

        .footer-heading {
            font-weight: 600;
            margin-bottom: 1rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-heading::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background: white;
        }

        .footer-links,
        .footer-contact {
            padding-left: 0;
        }

        .footer-links li,
        .footer-contact li {
            list-style: none;
            margin-bottom: 0.65rem;
            font-size: 0.95rem;
        }

        .footer-links a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-contact i {
            width: 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-bottom {
            font-size: 0.875rem;
            color: rgba(255, 255, 255, 0.7);
            border-top: 1px solid rgba(255, 255, 255, 0.2);
            padding-top: 1rem;
            margin-top: 2rem;
        }

        .footer-bottom img {
            height: 25px;
            object-fit: contain;
            border-radius: 3px;
        }

        .social-links a {
            color: white;
            margin-right: 10px;
            font-size: 1.25rem;
        }

        @media (max-width: 768px) {
            .footer-heading::after {
                left: 50%;
                transform: translateX(-50%);
            }

            .footer {
                text-align: center;
            }

            .footer .row > div {
                margin-bottom: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <x-navbar></x-navbar>

    <main class="pt-5 pb-5">
        {{ $slot }}
    </main>

    <footer class="footer pt-5 pb-4">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-4 col-lg-3">
                    <img src="{{ asset('img/logo.png') }}" alt="Footlane Logo" class="mb-3" style="max-width: 180px;">
                    <p class="text-white-50 small">Belanja mudah, aman, dan nyaman di Footlane. Produk berkualitas & harga terbaik setiap hari.</p>
                    <div class="d-flex gap-3 mt-3 social-links">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-md-4 col-lg-3">
                    <h5 class="footer-heading">Menu Utama</h5>
                    <ul class="footer-links">
                        <li><a href="/">Beranda</a></li>
                        <li><a href="/products">Produk</a></li>
                        <li><a href="/categories">Kategori</a></li>
                        <li><a href="">Tentang Kami</a></li>
                    </ul>
                </div>

                <div class="col-md-4 col-lg-3">
                    <h5 class="footer-heading">Bantuan</h5>
                    <ul class="footer-links">
                        <li><a href="">Cara Berbelanja</a></li>
                        <li><a href="">Pembayaran</a></li>
                        <li><a href="">Pengiriman</a></li>
                        <li><a href="">Pengembalian</a></li>
                        <li><a href="">FAQ</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <h5 class="footer-heading">Kontak Kami</h5>
                    <ul class="footer-contact text-white-50">
                        <li><i class="fas fa-map-marker-alt me-2"></i>Jl. Merdeka No.123, Tegal</li>
                        <li><i class="fas fa-phone me-2"></i>+62 856 6100 994</li>
                        <li><i class="fas fa-envelope me-2"></i>footlanestore@gmail.com</li>
                        <li><i class="fas fa-clock me-2"></i>08.00 - 20.00 WIB</li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 pt-3">
                <div>&copy; {{ date('Y') }} Footlane. All rights reserved.</div>

                <div class="d-flex gap-2 mt-3 mt-md-0">
                    <img src="{{ asset('img/visa.png') }}" alt="Visa" width="40" height="25">
                    <img src="{{ asset('img/yandex.png') }}" alt="Yandex Pay" width="40" height="25">
                    <img src="{{ asset('img/paypal.png') }}" alt="PayPal" width="40" height="25">
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>