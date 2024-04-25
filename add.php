<?php
include "koneksi.php";

function input($data)
{
    if (is_array($data)) {
        // Jika $data adalah array, kembalikan array yang telah di-trim
        return array_map('trim', $data);
    } else {
        // Jika $data adalah string, kembalikan string yang telah di-trim
        return trim($data);
    }
}

// Inisialisasi variabel untuk menyimpan pesan atau error
$message = "";

// Periksa apakah formulir telah dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari formulir
    $nama = input($_POST["nama_pemesan"]);
    $telepon = input($_POST["no_telp"]);
    $waktu = input($_POST["waktu_perjalanan"]);
    $jumlah = input($_POST["jumlah_peserta"]);
    $pelayananArray = isset($_POST["pelayanan"]) ? $_POST["pelayanan"] : [];

    // Melakukan iterasi pada setiap elemen array dan menerapkan fungsi input() secara terpisah
    foreach ($pelayananArray as &$item) {
        $item = input($item);
    }
    // Menggabungkan nilai-nilai array menjadi string dengan pemisah koma
    $pelayanan = implode(", ", $pelayananArray);
    $harga = input($_POST["harga_paket"]);
    $total = input($_POST["total_tagihan"]);
    // Selanjutnya, lakukan penyimpanan data ke database atau proses sesuai kebutuhan Anda.
    // Contoh:
    $sql = "INSERT INTO `tabel_pemesanan` (nama_pemesan, no_telp, waktu_perjalanan, jumlah_peserta, pelayanan, harga_paket, total_tagihan)
    VALUES (?, ?, ?, ?, ?, ?, ?)";
    // Persiapan statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, 'sssssss', $nama, $telepon, $waktu, $jumlah, $pelayanan, $harga, $total);

    // Eksekusi statement
    $hasil = mysqli_stmt_execute($stmt);

    if ($hasil) {
        // Jika penyimpanan data berhasil, set pesan sukses
        $message = "Pembayaran berhasil! Terima kasih, $nama!";

        // Tambahkan script JavaScript untuk menampilkan notifikasi
        echo '<script>
        alert("Pembayaran berhasil! Terima kasih, ' . $nama . '!");
        </script>';
    } else {
        // Jika ada kesalahan, tampilkan pesan error
        $message = "Pembayaran gagal. Silakan coba lagi atau hubungi layanan pelanggan.";
    }
    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan Paket Wisata</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Form Pemesanan Paket Wisata</h2>
        <form id="formPemesanan" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <div class="form-group">
                <label for="nama">Nama Pemesan:</label>
                <input type="text" class="form-control" id="nama" name="nama_pemesan" required>
            </div>


            <!-- Nomor Telp/HP -->
            <div class="form-group">
                <label for="telp">Nomor Telp/HP:</label>
                <input type="tel" class="form-control" id="telp" name="no_telp" required>
            </div>

            <!-- Waktu Pelaksanaan Perjalanan -->
            <div class="form-group">
                <label for="waktu">Waktu Pelaksanaan Perjalanan:</label>
                <input type="date" class="form-control" id="waktu" name="waktu_perjalanan" required>
            </div>

            <!-- Jumlah Peserta -->
            <div class="form-group">
                <label for="peserta">Jumlah Peserta:</label>
                <input type="number" class="form-control" id="peserta" name="jumlah_peserta" required>
            </div>

            <!-- Pelayanan Paket Perjalanan -->
            <div class="form-group">
                <label>Pelayanan Paket Perjalanan:</label><br>
                <input type="checkbox" id="penginapan" name="pelayanan[]" value="penginapan">
                <label for="penginapan">Penginapan</label><br>
                <input type="checkbox" id="transportasi" name="pelayanan[]" value="transportasi">
                <label for="transportasi">Transportasi</label><br>
                <input type="checkbox" id="makanan" name="pelayanan[]" value="makanan">
                <label for="makanan">Makanan</label>
            </div>

            <!-- Harga Paket Perjalanan -->
            <div class="form-group">
                <label for="harga">Harga Paket Perjalanan:</label>
                <input type="number" class="form-control" id="harga" name="harga_paket" value="1500000" readonly>
            </div>

            <!-- Jumlah Tagihan -->
            <div class="form-group">
                <label for="tagihan">Jumlah Tagihan:</label>
                <input type="number" class="form-control" id="tagihan" name="total_tagihan" readonly>
                <div id="totalTagihan"></div>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <a href="wisataLanjukang.php" class="btn btn-secondary mb-5">Kembali</a>
            <button type="submit" class="btn btn-primary mb-5">Simpan</button>
            <button type="button" class="btn btn-secondary mb-5" onclick="window.history.back();">Batal</button>
            <a href="viewReservasi.php" class="btn btn-primary mb-5">View Reservasi</a>

        </form>
    </div>

    <!-- Modal Pop-up -->
    <div class="modal" tabindex="-1" role="dialog" id="konfirmasiModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Pemesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nama: <span id="modalNama"></span></p>
                    <p>Jumlah Peserta: <span id="modalPeserta"></span></p>
                    <p>Waktu Perjalanan: <span id="modalWaktu"></span></p>
                    <p>Layanan Paket: <span id="modalLayanan"></span></p>
                    <p>Harga Paket: <span id="modalHarga"></span></p>
                    <p>Jumlah Tagihan: <span id="modalTagihan"></span></p>
                </div>
                <div class="modal-footer mt-5">
                    <button type="button" class="btn btn-primary" onclick="submitForm()">Konfirmasi</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="viewReservasi.php" class="btn btn-info">View Reservasi</a </div>
                </div>
            </div>
        </div>
        <div class="container"></div>
        <!-- Bootstrap JS dan jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- JavaScript untuk Pop-up -->
        <script>
            // Fungsi untuk menampilkan modal konfirmasi
            $('#formPemesanan').submit(function(event) {
                event.preventDefault(); // Mencegah form dari submit biasa
                // Mengisi modal dengan data dari form
                $('#modalNomor').text($('#nomor').val());
                $('#modalNama').text($('#nama').val());
                $('#modalPeserta').text($('#peserta').val());
                $('#modalWaktu').text($('#waktu').val());
                // Tambahkan logika untuk mengisi layanan paket, harga paket, dan jumlah tagihan
                var layananPaket = [];
                $('input[name="pelayanan[]"]:checked').each(function() {
                    layananPaket.push($(this).val());
                });
                $('#modalLayanan').text(layananPaket.join(', '));
                $('#modalHarga').text($('#harga').val());
                // Tambahkan logika untuk menghitung jumlah tagihan
                var jumlahTagihan = calculateTagihan();
                $('#modalTagihan').text(jumlahTagihan);
                $('#konfirmasiModal').modal('show'); // Menampilkan modal
            });

            // Tambahkan event listener pada input terakhir dalam formulir
            $('#tagihan').prevAll('input, select, textarea').last().on('blur', function() {
                // Hitung total tagihan
                var totalTagihan = calculateTagihan();
                // Tetapkan nilai total tagihan ke dalam input total tagihan
                $('#tagihan').val(totalTagihan);
            });

            // Fungsi untuk menampilkan total tagihan dan menampilkan hasilnya
            function calculateTagihan() {
                var jumlahPeserta = parseInt($('#peserta').val());
                var hargaPaket = parseInt($('#harga').val());
                var totalTagihan = jumlahPeserta * hargaPaket;
                if ($('#penginapan').is(':checked')) {
                    totalTagihan += 1500000;
                }
                if ($('#transportasi').is(':checked')) {
                    totalTagihan += 500000;
                }
                if ($('#makanan').is(':checked')) {
                    totalTagihan += 1000000;
                }
                return totalTagihan;
            }

            $('input[name="pelayanan[]"]').change(function() {
                var jumlahPeserta = $('#peserta').val();
                var hargaPaket = $('#harga').val();
                var totalTagihan = jumlahPeserta * hargaPaket;
                if ($('#penginapan').is(':checked')) {
                    totalTagihan += 1500000;
                }
                if ($('#transportasi').is(':checked')) {
                    totalTagihan += 500000;
                }
                if ($('#makanan').is(':checked')) {
                    totalTagihan += 1000000;
                }
                $('#tagihan').val(totalTagihan);
            });


            // Fungsi untuk submit form setelah konfirmasi
            function submitForm() {
                document.getElementById('formPemesanan').submit();
            }

            // Fungsi untuk submit form setelah konfirmasi
            function submitForm() {
                document.getElementById('formPemesanan').submit();
            }
        </script>


</body>

</html>