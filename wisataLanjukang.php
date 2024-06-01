<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Wisata Pantai Lanjukang</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            padding: 60px 20px;
            background: linear-gradient(135deg, #FF6B6B, #FFD194);
            color: #ffffff;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .header:hover {
            transform: rotateY(10deg) rotateX(10deg) scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .header h1 {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .header p {
            font-size: 1.25rem;
            margin-top: 10px;
            opacity: 0.8;
        }

        .navbar {
            background-color: #FF6B6B;
            color: #ffffff;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.320, 1);
        }


        .navbar-brand {
            color: #ffffff !important;
            font-size: 1.5rem;
            font-weight: bold;
            padding-left: 20px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-size: 1.1rem;
            padding: 15px 20px;
            transition: background-color 0.3s ease;
            margin: 0 10px;
            border-radius: 15px;
        }

        .navbar-nav .nav-link:hover {
            background-color: white;
            border-radius: 15px;
            color: #f3abab !important;
        }

        .main-picture {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            max-height: 500px;
            object-fit: cover;
        }

        .card-group {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 40px 0;
        }

        .card {
            flex: 1 1 calc(30% - 20px);
            max-width: calc(30% - 20px);
            margin: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #ffffff;
            color: #333333;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card img {
            width: 100%;
            height: auto;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-top: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .search-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .embed-responsive {
            overflow: hidden;
            padding-top: 56.25%;
            position: relative;
            border-radius: 10px;
        }

        .embed-responsive iframe {
            border: 0;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
            border-radius: 10px;
        }

        .footer {
            background: linear-gradient(135deg, #FF6B6B, #FFD194);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .card {
                flex: 1 1 calc(45% - 20px);
                max-width: calc(45% - 20px);
            }
        }

        @media (max-width: 576px) {
            .card {
                flex: 1 1 100%;
                max-width: 100%;
            }

            .header h1 {
                font-size: 2.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <div class="header">
            <h1>Selamat Datang Di Wisata Pantai Lanjukang</h1>
            <p>Nikmati keindahan alam dan berbagai macam kegiatan menarik di Pantai Lanjukang.</p>
        </div>

        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#objek_wisata">Objek Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#fasilitas_wisata">Fasilitas Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#paket_wisata">Paket Wisata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wisata_pulau">Wisata Pulau</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">Reservasi</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-4">
            <div class="text-center">
                <img src="img/pulau-lanjukang.jpg" class="img-fluid main-picture" alt="Main Picture">
            </div>

            <div class="card-group">
                <div class="card">
                    <img src="img/lanjukang-paket2.jpg" class="card-img-top" alt="Paket Trip Lanjukang 3 hari">
                    <div class="card-body">
                        <h5 class="card-title">Paket Trip Lanjukang 3 hari</h5>
                        <p class="card-text"><small class="text-body-secondary">23 April 2024</small></p>
                        <p class="card-text">Murah Meriah Paket Lanjukang 3 hari, free kemah dan tabung gas.</p>
                    </div>
                </div>

                <div class="card">
                    <img src="img/banan.jpeg" class="card-img-top" alt="Paket Nginap + Banana Boat Lanjukang">
                    <div class="card-body">
                        <h5 class="card-title">Paket Nginap + Banana Boat Lanjukang</h5>
                        <p class="card-text"><small class="text-body-secondary">20 April 2024</small></p>
                        <p class="card-text">Paket Nginap dan Banana Boat dijamin seru!, buruan pesan sekarang.</p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="search-container mb-3">
                            <input class="form-control me-2" type="text" placeholder="Cari..." aria-label="Cari">
                            <button class="btn btn-secondary" type="button">Cari</button>
                        </div>
                        <div class="embed-responsive">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/hqxI2ujDF6w?si=J02-90GcSFziTfJ8"
                                allowfullscreen></iframe>
                        </div>
                        <a href="https://www.youtube.com/embed/hqxI2ujDF6w?si=J02-90GcSFziTfJ8" target="_blank"
                            class="btn btn-primary mt-3">Link ke Video YouTube</a>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p>&copy; 2024 Wisata Pantai Lanjukang. All Rights Reserved.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
