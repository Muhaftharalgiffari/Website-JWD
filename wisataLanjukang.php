<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!--font link-->
    <link rel="stylesheet" href="style.css">
    <title>Wisata Pantai Lanjukang</title>

</head>

<style>
    .image-row {
        width: 100%;
    }

    /* Styling the image */
    .main-picture {
        width: 100%;
        height: 120px;
    }

    /* Styling the clickable th elements */
    th {
        cursor: pointer;
        transition: background-color 0.3s, border 0.3s;
        /* Adding transition effect */
    }

    /* Adding hover effect */
    th:hover {
        background-color: #424eac;
        border: 1px solid #999;
        /* Add border on hover */
    }
</style>

<body>
    <div class="container-fluid">
        <table class="table table-borderless table-hover my-5">
            <tbody>
                <tr>
                    <td colspan="8">
                        <h1 class=>Selamat Datang Di Wisata Pantai Lanjukang</h1>
                    </td>
                </tr>
                <tr>
                    <td colspan="8">
                        <!-- Menggunakan class "text-center" untuk membuat teks menjadi pusat -->
                        <img src="img/pulau-lanjukang.jpg" class="img-fluid mx-auto d-block" alt="Main Picture" style="width: 100%; height: 300px;">
                    </td>
                </tr>
                <tr bgcolor="gray" class="text-center">
                    <th><a href="#beranda">Beranda</a></th>
                    <th><a href="#objek_wisata">Objek Wisata</a></th>
                    <th><a href="#fasilitas_wisata">Fasilitas Wisata</a></th>
                    <th><a href="#paket_wisata">Paket Wisata</a></th>
                    <th><a href="#wisata_pulau">Wisata Pulau</a></th>
                    <th><a href="add.php">Reservasi</a></th>

                </tr>
            </tbody>
        </table>
        <!-- Kode gambar-->
        <div class="card-group">
            <!-- Card 1 -->
            <div class="card">
                <img src="img/lanjukang-paket2.jpg" class="card-img-top" alt="..." style="width: 200px; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">Paket Trip Lanjukang 3 hari</h5>
                    <p class="card-text"><small class="text-body-secondary">23 April 2024 </small></p>
                    <p class="card-text">Murah Meriah Paket Lanjukang 3 hari, free kemah dan tabung gas.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="card">
                <img src="img/banan.jpeg" class="card-img-top" alt="..." style="width: 200px; height: auto;">
                <div class="card-body">
                    <h5 class="card-title">Paket Nginap + Banana Boat Lanjukang</h5>
                    <p class="card-text"><small class="text-body-secondary">20 April 2024</small></p>
                    <p class="card-text">Paket Nginap dan Banana Boat dijamin seru!, buruan pesan sekarang</p>
                </div>
            </div>
            <!-- Video -->
            <div class="card">
                <div class="hstack gap-3 mb-3" style="height: 50px;">
                    <input class="form-control me-auto" type="text" placeholder="Add your item here..." aria-label="Add your item here...">
                    <button type="button" class="btn btn-secondary">cari</button>
                    <div class="vr"></div>
                </div>
                <div class="card">

                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-ite" src="https://www.youtube.com/embed/hqxI2ujDF6w?si=J02-90GcSFziTfJ8" style="width: 200px; height: auto;"></iframe>
                    </div>
                    <div class="card-body">
                        <a href="https://www.youtube.com/embed/hqxI2ujDF6w?si=J02-90GcSFziTfJ8" target="_blank">Link ke Video
                            YouTube</a>
                    </div>
                </div>
</body>

</html>