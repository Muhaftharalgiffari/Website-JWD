<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Tambahkan link CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        function confirmDelete() {
            if (confirm("Apakah Anda yakin ingin menghapus reservasi ini?")) {
                // Lakukan proses penghapusan data di sini
                // Misalnya:
                // hapusData();
                // Tampilkan notifikasi setelah data terhapus
                alert("Data telah dihapus.");
                return true;
            } else {
                return false;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <table class="table table-striped mt-3 mb-2">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nomor Reservasi</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Nomor Telp/HP</th>
                    <th scope="col">Waktu Perjalanan</th>
                    <th scope="col">Jumlah Peserta</th>
                    <th scope="col">Pelayanan</th>
                    <th scope="col">Harga Paket</th>
                    <th scope="col">Total Tagihan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";

                // Query untuk mengambil data reservasi dari database
                $sql = "SELECT * FROM tabel_pemesanan";
                $stmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nomor_reservasi'] . "</td>";
                    echo "<td>" . $row['nama_pemesan'] . "</td>";
                    echo "<td>" . $row['no_telp'] . "</td>";
                    echo "<td>" . $row['waktu_perjalanan'] . "</td>";
                    echo "<td>" . $row['jumlah_peserta'] . "</td>";
                    echo "<td>" . $row['pelayanan'] . "</td>";
                    echo "<td>" . $row['harga_paket'] . "</td>";
                    echo "<td>" . $row['total_tagihan'] . "</td>";
                    echo "<td>";
                    echo "<a href='editReservasi.php?nomor_reservasi=" . $row['nomor_reservasi'] . "' class='btn btn-primary mb-4'>Edit</a>";
                    echo "<a href='hapusReservasi.php?nomor_reservasi=" . $row['nomor_reservasi'] . "' class='btn btn-dark' onclick='return confirmDelete()'>Hapus</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="add.php" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>