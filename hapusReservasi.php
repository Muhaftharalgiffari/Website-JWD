<?php
include "koneksi.php";
if (isset($_GET['nomor_reservasi'])) {
    $id = $_GET['nomor_reservasi'];
    // Persiapan statement
    $stmt = mysqli_prepare($conn, "DELETE FROM tabel_pemesanan WHERE nomor_reservasi = ?");
    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, 's', $id);
    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);
    if ($result) {
        header("Location: viewReservasi.php"); // Redirect kembali ke halaman viewReservasi.php setelah berhasil menghapus
        exit();
    } else {
        echo "Gagal menghapus data.";
    }
    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    echo "ID tidak ditemukan.";
}
?>
