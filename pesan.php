<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Paket Wisata</title>
    <style>
        .error {
            color: red;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .inline {
            display: inline-block;
            margin-right: 10px;
        }
    </style>
    <link rel="stylesheet" href="css/form.css">
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

    <h2>Form Pemesanan Paket Wisata</h2>
    <form method="post">
    <div class="form-group">
                <label for="nama_pemesan" class="form-label">Nama Pemesan:</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" class="form-control" required value="<?= isset($_POST['nama_pemesan']) ? htmlspecialchars($_POST['nama_pemesan']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="nomor_hp" class="form-label">Nomor HP/Telp:</label>
                <input type="text" id="nomor_hp" name="nomor_hp" class="form-control" required value="<?= isset($_POST['nomor_hp']) ? htmlspecialchars($_POST['nomor_hp']) : '' ?>">
            </div>

            <div class="form-group">
                <label for="tanggal_pesan" class="form-label">Tanggal Pesan:</label>
                <input type="date" id="tanggal_pesan" name="tanggal_pesan" class="form-control" required value="<?= isset($_POST['tanggal_pesan']) ? $_POST['tanggal_pesan'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="jumlah_hari" class="form-label">Jumlah Hari Perjalanan:</label>
                <input type="number" id="jumlah_hari" name="jumlah_hari" class="form-control" required value="<?= isset($_POST['jumlah_hari']) ? $_POST['jumlah_hari'] : '' ?>">
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
                <label for="jumlah_peserta" class="form-label">Jumlah Peserta:</label>
                <input type="number" id="jumlah_peserta" name="jumlah_peserta" class="form-control" required value="<?= isset($_POST['jumlah_peserta']) ? $_POST['jumlah_peserta'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="harga_paket" class="form-label">Harga Paket Perjalanan:</label>
                <input type="text" id="harga_paket" name="harga_paket" class="form-control" readonly value="<?= isset($_POST['harga_paket']) ? $_POST['harga_paket'] : '' ?>">
            </div>

            <div class="form-group">
                <label for="jumlah_tagihan" class="form-label">Jumlah Tagihan:</label>
                <input type="text" id="jumlah_tagihan" name="jumlah_tagihan" class="form-control" readonly value="<?= isset($_POST['jumlah_tagihan']) ? $_POST['jumlah_tagihan'] : '' ?>">
            </div>

            <div class="d-grid gap-2">
                <button type="button" class="btn btn-success" onclick="hitungTotal()">Hitung</button>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
    </form>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<?php
// Include file koneksi
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nama_pemesan = htmlspecialchars($_POST['nama_pemesan']);
    $nomor_hp = htmlspecialchars($_POST['nomor_hp']);
    $tanggal_pesan = $_POST['tanggal_pesan'];

    $jumlah_hari = $_POST['jumlah_hari'];
    $penginapan = isset($_POST['penginapan']) ? 1 : 0;
    $transportasi = isset($_POST['transportasi']) ? 1 : 0;
    $servis_makan = isset($_POST['servis_makan']) ? 1 : 0;
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $harga_paket = $_POST['harga_paket'];
    $jumlah_tagihan = $_POST['jumlah_tagihan'];

    if (!empty($harga_paket) && !empty($jumlah_tagihan)) {
        $sql = "INSERT INTO pemesanan (nama_pesanan, nomor_hp, tanggal_pesan, jumlah_hari, penginapan, transportasi, servis_makan, jumlah_peserta, harga_paket, jumlah_tagihan)
                VALUES ('$nama_pemesan', '$nomor_hp', '$tanggal_pesan', $jumlah_hari, $penginapan, $transportasi, $servis_makan, $jumlah_peserta, $harga_paket, $jumlah_tagihan)";

        if ($conn->query($sql) === TRUE) {
            echo "<script>redirectToHome();</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Gagal menyimpan data. Pastikan Anda telah menghitung total harga terlebih dahulu.";
    }
}

$conn->close();
?>

</body>

</html>