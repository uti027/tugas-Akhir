<?php
include 'koneksi.php'; // Mengimpor file koneksi.php untuk menghubungkan ke database

// Mengambil data dari form
$id = $_POST['id'];
$nama_pesanan = $_POST['nama_pesanan'];
$nomor_hp = $_POST['nomor_hp'];
$jumlah_peserta = $_POST['jumlah_peserta'];
$jumlah_hari = $_POST['jumlah_hari'];
$penginapan = $_POST['penginapan'];
$transportasi = $_POST['transportasi'];
$servis_makan = $_POST['servis_makan'];
$harga_paket = $_POST['harga_paket'];
$jumlah_tagihan = $_POST['jumlah_tagihan'];

// Query untuk memperbarui data
$query = "UPDATE pemesanan SET 
    nama_pesanan='$nama_pesanan', 
    nomor_hp='$nomor_hp', 
    jumlah_peserta='$jumlah_peserta', 
    jumlah_hari='$jumlah_hari', 
    penginapan='$penginapan', 
    transportasi='$transportasi', 
    servis_makan='$servis_makan', 
    harga_paket='$harga_paket', 
    jumlah_tagihan='$jumlah_tagihan' 
    WHERE id='$id'";

mysqli_query($conn, $query) or die(mysqli_error($conn));

// Redirect ke halaman tabel dengan pesan
header("location:modifikasi.php?pesan=update");
?>
