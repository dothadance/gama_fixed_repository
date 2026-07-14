<?php
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Package Management - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">
</head>
<body>

<div class="container">

    <a href="../dashboard.php" class="btn-back">&larr; Back to Dashboard</a>

    <h2>Event Package Management Board</h2>

    <table>
        <thead>
            <tr>
                <th>Event Type</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Event Date</th>
                <th>Status</th>
                <th>Number of Guests</th>
                <th>Note</th>
            </tr>
        </thead>

        <tbody>

        <?php

        $sql = "SELECT * FROM reservation ORDER BY reservation_id DESC";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {

            while($row = mysqli_fetch_assoc($result)) {

                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['occasion']) . "</td>";
                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                echo "<td>" . htmlspecialchars($row['phone_number']) . "</td>";
                echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['time']) . "</td>";
                echo "<td>" . htmlspecialchars($row['number_of_guests']) . " Guests</td>";
                echo "<td>" . htmlspecialchars($row['notes']) . "</td>";
                echo "</tr>";

            }

        } else {

            echo "<tr>";
            echo "<td colspan='7'>No event reservations found.</td>";
            echo "</tr>";

        }

        ?>

        </tbody>
    </table>

    <h2>Event Statistics</h2>

<?php

$sql_stats = "SELECT occasion, COUNT(*) AS total
              FROM reservation
              WHERE occasion IS NOT NULL
              AND occasion != ''
              GROUP BY occasion
              ORDER BY total DESC";

$result_stats = mysqli_query($conn, $sql_stats);

$mostPopular = '';

if ($result_stats && mysqli_num_rows($result_stats) > 0) {

    while($row = mysqli_fetch_assoc($result_stats)) {

        if ($mostPopular == '') {
            $mostPopular = $row['occasion'];
        }

        echo "<p>Total <strong>" .
             htmlspecialchars($row['occasion']) .
             "</strong> Events : " .
             $row['total'] .
             "</p>";
    }

    echo "<p><strong>Most Popular Event : " .
         htmlspecialchars($mostPopular) .
         "</strong></p>";

} else {

    echo "<p>No event statistics available yet.</p>";

}

?>
