<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Studio Musik - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .hero-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }
        .btn-hero {
            padding: 15px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
            margin: 0 10px;
        }
        .features-section {
            padding: 80px 0;
        }
        .feature-card {
            text-align: center;
            padding: 2rem;
            border-radius: 15px;
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-10px);
        }
        .feature-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .steps-section {
            background: #f8f9fa;
            padding: 80px 0;
        }
        .step-number {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin: 0 auto 1rem;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <i class="bi bi-music-note-beamed" style="font-size: 5rem; margin-bottom: 2rem;"></i>
            <h1>Studio Musik Profesional</h1>
            <p>Sewa ruang studio berkualitas untuk recording, rehearsal, streaming atau sesi privat.<br>Mudah dipesan, aman, dan terjangkau.</p>
            <div>
                <a href="{{ route('register') }}" class="btn btn-light btn-hero">
                    <i class="bi bi-person-plus"></i> Daftar Sekarang
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-hero">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Mengapa Memilih Kami?</h2>
                <p class="text-muted">Fasilitas terbaik untuk kebutuhan musik Anda</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-building feature-icon text-primary"></i>
                        <h4 class="fw-bold">Ruang Profesional</h4>
                        <p class="text-muted">Ruang ber-AC, akustik terkontrol, peralatan tersedia sesuai paket.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-gear-fill feature-icon text-success"></i>
                        <h4 class="fw-bold">Layanan Fleksibel</h4>
                        <p class="text-muted">Recording, rehearsal, live streaming — pilih layanan sesuai kebutuhan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <i class="bi bi-calendar-check feature-icon text-info"></i>
                        <h4 class="fw-bold">Pemesanan Mudah</h4>
                        <p class="text-muted">Pilih tanggal dan jam, konfirmasi pembayaran, pantau riwayat booking.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Steps Section -->
    <section class="steps-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Cara Booking Studio</h2>
                <p class="text-muted">Proses booking yang simple dan cepat</p>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number">1</div>
                        <h5 class="fw-bold">Daftar / Masuk</h5>
                        <p class="text-muted">Buat akun atau login ke sistem</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number">2</div>
                        <h5 class="fw-bold">Pilih Ruangan</h5>
                        <p class="text-muted">Browse dan pilih studio yang sesuai</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number">3</div>
                        <h5 class="fw-bold">Tentukan Jadwal</h5>
                        <p class="text-muted">Pilih tanggal dan jam booking</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="text-center">
                        <div class="step-number">4</div>
                        <h5 class="fw-bold">Konfirmasi</h5>
                        <p class="text-muted">Lakukan pembayaran dan mulai sesi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container text-center text-white">
            <h2 class="fw-bold mb-3">Siap Memulai?</h2>
            <p class="mb-4">Daftar sekarang dan dapatkan pengalaman booking studio terbaik!</p>
            <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                <i class="bi bi-rocket-takeoff"></i> Mulai Sekarang
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white text-center">
        <div class="container">
            <p class="mb-0">&copy; 2025 Studio Musik. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
