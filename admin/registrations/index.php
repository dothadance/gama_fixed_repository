<?php
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reservations - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">
</head>
<body>

<div class="container">
    <a href="../dashboard.php" class="btn-back">&larr; Back to Dashboard</a>

    <h2>Customer Reservations</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Number of Guests</th>
                <th>Occasion</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM reservation ORDER BY reservation_id DESC";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['reservation_id'] . "</td>";
                    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";
                    echo "<td>" . $row['number_of_guests'] . " Guests</td>";
                    echo "<td>" . htmlspecialchars($row['occasion']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8' class='no-data'>No reservation records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>
</html>
