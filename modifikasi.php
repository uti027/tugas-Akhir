<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/styles5.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
  <title>Wisata Malino</title>
</head>

<body>
  <div class="main-container">
    <div class="img-header">
      <div class="brand-container">
        <h1>Objek Wisata Alam</h1>
        <h2>Di Sekitar Bandung</h2>

        <img src="images/logo_malino_kuning.png" alt="" />
      </div>
      <!-- brand-container -->

      <img src="images/foto14.jpg" alt="foto14" />
      <img src="images/foto20.jpeg" alt="foto20" />
      <img src="images/foto21.jpeg" alt="foto21" />
      <img src="images/foto22.jpeg" alt="foto22" />
      <img src="images/foto23.jpeg" alt="foto23" />
      <img src="images/foto24.jpeg" alt="foto24" />
      <img src="images/foto25.jpeg" alt="foto25" />
      <img src="images/foto26.jpeg" alt="foto26" />
      <img src="images/foto27.jpeg" alt="foto27" />
      <img src="images/foto28.jpeg" alt="foto28" />
    </div>
    <!-- end img-header -->

    <div class="menu-header">
      <a href="index.php" style="color: white;">Beranda</a>
      <a href="pesan.php" style="color: white;">Daftar Paket Wisata</a>
      <a href="modifikasi.php" style="color: white;">Modifikasi Pesanan</a>
    </div>
    <!-- end menu-header -->
        <div class="container my-4">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>NO HP</th>
                        <th>Jumlah Peserta</th>
                        <th>Jumlah Hari</th>
                        <th>Penginapan</th>
                        <th>Transportasi</th>
                        <th>Servis Makan</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'koneksi.php'; // Mengimpor file koneksi.php untuk menghubungkan ke database
                $no = 1; // Inisialisasi variabel nomor     
                $data = mysqli_query($conn,"select * from pemesanan"); // Query untuk mengambil semua data pesanan
                while($d = mysqli_fetch_array($data)){ // Perulangan untuk menampilkan data dalam bentuk baris tabel
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td> <!-- Kolom nomor increment -->
                        <td><?php echo $d['nama_pesanan']; ?></td> 
                        <td><?php echo $d['nomor_hp']; ?></td> 
                        <td><?php echo  $d['jumlah_peserta'] . "&nbsp;Orang"; ?></td>
                        <td><?php echo $d['jumlah_hari'] . "&nbsp;Hari"; ?></td>
                        <td><?php echo $d['penginapan']; ?></td>
                        <td><?php echo $d['transportasi']; ?></td>
                        <td><?php echo $d['servis_makan']; ?></td>
                        <td><?php echo number_format($d['harga_paket'], 0, '', '.') . ""; ?></td>
                        <td><?php echo number_format($d['jumlah_tagihan'], 0, '', '.') . ""; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-custom btn-edit">EDIT</a>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-custom btn-delete" onclick="return confirmDelete();">HAPUS</a>
                            <script>
                                function confirmDelete() {
                                return confirm('Apakah Anda yakin ingin menghapus data ini?');
                                                    }
                            </script>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>

        <!-- Optional JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    </div>
</body>
</html>
