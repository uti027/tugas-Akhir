<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $tanggal_pesan = $_POST['tanggal_pesan'];
    $waktu_pelaksanaan = $_POST['waktu_pelaksanaan'];
    $pelayanan = isset($_POST['pelayanan']) ? $_POST['pelayanan'] : [];
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $total_tagihan = $_POST['total_tagihan'];

    // Process the form data as needed
    echo "<h2>Detail Pemesanan:</h2>";
    echo "Nama Pemesan: $nama<br>";
    echo "Nomor HP/Telp: $telepon<br>";
    echo "Tanggal Pesan: $tanggal_pesan<br>";
    echo "Waktu Pelaksanaan Perjalanan: $waktu_pelaksanaan<br>";
    echo "Pelayanan Paket Perjalanan:<br>";

    foreach ($pelayanan as $item) {
        echo "- Rp " . number_format($item, 0, ',', '.') . "<br>";
    }

    echo "Jumlah Peserta: $jumlah_peserta<br>";
    echo "Harga Paket Perjalanan: Rp " . number_format($harga_paket, 0, ',', '.') . "<br>";
    echo "Jumlah Tagihan: Rp " . number_format($total_tagihan, 0, ',', '.') . "<br>";
}
?>