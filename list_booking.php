<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "travel_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan</title>
    <link rel="stylesheet"href="styles.css">
</head>
<body>
    <h2>Daftar Pesanan</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Phone</th>
            <th>Jumlah Peserta</th>
            <th>Jumlah Hari</th>
            <th>Akomodasi</th>
            <th>Transportasi</th>
            <th>Servis/Makan</th>
            <th>Harga Paket</th>
            <th>Total Tagihan</th>
            <th>Aksi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["nama"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["jumlah_peserta"] . "</td>
                    <td>" . $row["jumlah_hari"] . "</td>
                    <td>" . $row["akomodasi"] . "</td>
                    <td>" . $row["transportasi"] . "</td>
                    <td>" . $row["servis_makan"] . "</td>
                    <td>" . number_format($row["harga_paket"], 2, ',', '.') . "</td>
                    <td>" . number_format($row["total_tagihan"], 2, ',', '.') . "</td>
                    <td>
                        <a href='edit_booking.php?id=" . $row["id"] . "'>Edit</a> | 
                        <a href='delete_booking.php?id=" . $row["id"] . "'>Delete</a>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10'>No bookings found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
