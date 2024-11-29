<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Parkir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .hero {
            background: url('{{ asset('image/parking.jpg') }}') no-repeat center center/cover; height: 100vh;
            color: white;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .features-section {
            padding: 50px 15px;
        }
        .features-section h2 {
            margin-bottom: 30px;
            text-align: center;
        }
        .feature-box {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: 0.3s;
        }
        .feature-box:hover {
            background-color: #f8f9fa;
            transform: scale(1.05);
        }
        footer {
            text-align: center;
            padding: 20px;
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Sistem Parkir</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1 class="display-4" style="background-color: rgba(0, 0, 0, 0.7); padding: 10px 20px; border-radius: 5px; text-align: center;margin-top: -450px;">
            Selamat Datang di Sistem Parkir Modern
        </h1>
    </div>

    <!-- About Section -->
    <section id="about" class="text-center py-5 bg-light">
        <div class="container">
            <h2 class="mb-4">Tentang Sistem Kami</h2>
            <p>Sistem parkir kami dirancang untuk mempermudah pengelolaan kendaraan di tempat parkir Anda. Dengan teknologi modern, Anda dapat melacak transaksi, mengatur biaya parkir, dan memberikan pengalaman terbaik bagi pelanggan Anda.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features-section">
        <div class="container">
            <h2 class="mb-4">Fitur Utama</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Manajemen Parkir</h4>
                        <p>Kelola parkir kendaraan dengan sistem yang efisien dan mudah digunakan.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Laporan Keuangan</h4>
                        <p>Hasilkan laporan keuangan yang akurat dan mudah diakses kapan saja.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-box">
                        <h4>Notifikasi Transaksi</h4>
                        <p>Berikan notifikasi real-time untuk setiap transaksi yang dilakukan.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; {{ date('Y') }} Sistem Parkir.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
