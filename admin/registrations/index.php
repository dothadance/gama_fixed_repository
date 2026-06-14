<?php
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Registrasi - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">
</head>
<body>

<div class="container">
    <a href="../dashboard.php" class="btn-back">&larr; Kembali ke Dashboard</a>

    <h2>Daftar Reservasi Pelanggan</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Pelanggan</th>
                <th>No. HP</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Jumlah Tamu</th>
                <th>Acara</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM reservation ORDER BY reservation_id DESC"; 
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . ($row['reservation_id'] ?? $row['id'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama'] ?? $row['name'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['no_hp'] ?? $row['phone_number'] ?? '') . "</td>";
                    echo "<td>" . ($row['tanggal'] ?? $row['date'] ?? '') . "</td>";
                    echo "<td>" . ($row['jam'] ?? $row['time'] ?? '') . "</td>";
                    echo "<td>" . ($row['jumlah_tamu'] ?? $row['number_of_guests'] ?? 0) . " Orang</td>";
                    echo "<td>" . htmlspecialchars($row['acara'] ?? $row['occasion'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['catatan'] ?? $row['notes'] ?? '') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='no-data'>Belum ada data reservasi masuk.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>