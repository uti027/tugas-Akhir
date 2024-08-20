<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM pemesanan WHERE id='$id'") or die(mysqli_error($conn));

header("location:modifikasi.php?pesan=hapus");
?>
