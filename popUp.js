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
