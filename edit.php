<?php
include 'koneksi.php'; // Mengimpor file koneksi.php untuk menghubungkan ke database

// Mengambil ID dari URL
$id = $_GET['id'];

// Query untuk mendapatkan data berdasarkan ID
$result = mysqli_query($conn, "SELECT * FROM pemesanan WHERE id='$id'");

// Mengecek apakah data ditemukan
if (mysqli_num_rows($result) == 0) {
    echo "Data tidak ditemukan!";
    exit;
}

// Mengambil data dari query
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT PESANAN</title>
    <link rel="stylesheet" href="css/style.css ">
    <link rel="stylesheet" href="css/styles6.css">
    <script>
        function hitungTotal() {
            let hargaPaket = 0;

            if (document.querySelector('input[name="penginapan"]:checked')) hargaPaket += 1000000;
            if (document.querySelector('input[name="transportasi"]:checked')) hargaPaket += 1200000;
            if (document.querySelector('input[name="servis_makan"]:checked')) hargaPaket += 500000;

            let jumlahPeserta = document.querySelector('input[name="jumlah_peserta"]').value;
            let jumlahHari = document.querySelector('input[name="jumlah_hari"]').value;
            let totalHargaPerHari = hargaPaket;
            let jumlahTagihan = totalHargaPerHari * jumlahPeserta * jumlahHari;

            document.getElementById('harga_paket').value = hargaPaket;
            document.getElementById('jumlah_tagihan').value = jumlahTagihan;
        }

        function redirectToHome() {
            alert('Data berhasil disimpan');
            window.location.href = 'index.php';
        }
    </script>

</head>
<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Edit Pesanan</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-group">
                <label for="nama_pesanan" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama_pesanan" name="nama_pesanan" value="<?php echo $data['nama_pesanan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nomor_hp" class="form-label">NO HP</label>
                <input type="text" class="form-control" id="nomor_hp" name="nomor_hp" value="<?php echo $data['nomor_hp']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                <input type="number" class="form-control" id="jumlah_peserta" name="jumlah_peserta" value="<?php echo $data['jumlah_peserta']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
                <input type="number" class="form-control" id="jumlah_hari" name="jumlah_hari" value="<?php echo $data['jumlah_hari']; ?>" required>
            </div>
            <fieldset class="form-group">
                <legend class="form-label">Pelayanan Paket Perjalanan:</legend>
                <div class="form-check">
                    <input type="checkbox" id="penginapan" name="penginapan" value="1" class="form-check-input" <?= isset($_POST['penginapan']) ? 'checked' : '' ?>>
                    <label for="penginapan" class="form-check-label">Penginapan (Rp 1.000.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="transportasi" name="transportasi" value="1" class="form-check-input" <?= isset($_POST['transportasi']) ? 'checked' : '' ?>>
                    <label for="transportasi" class="form-check-label">Transportasi (Rp 1.200.000)</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" id="servis_makan" name="servis_makan" value="1" class="form-check-input" <?= isset($_POST['servis_makan']) ? 'checked' : '' ?>>
                    <label for="servis_makan" class="form-check-label">Servis/Makan (Rp 500.000)</label>
                </div>
            </fieldset>

            <div class="form-group">
                <label for="harga_paket" class="form-label">Harga Paket Perjalanan:</label>
                <input type="text" id="harga_paket" name="harga_paket" class="form-control" readonly value="<?= isset($_POST['harga_paket']) ? $_POST['harga_paket'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan:</label>
                <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control" readonly value="<?= isset($_POST['jumlah_tagihan']) ? $_POST['jumlah_tagihan'] : '' ?>">
            </div>
            <button type="button" class="btn btn-custom btn-success" onclick="hitungTotal()">Hitung</button>
            <button type="submit" class="btn btn-custom btn-edit">Simpan</button>
            <a href="modifikasi.php" class="btn btn-custom btn-delete">Batal</a>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
