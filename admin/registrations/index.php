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
                <th>Reservation Code</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Date</th>
                <th>Time</th>
                <th>Number of Guests</th>
                <th>Occasion</th>
                <th>Notes</th>
                <th>Current Status</th>
                <th>Change Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM reservation ORDER BY reservation_id DESC";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= $row['reservation_id']; ?></td>
                        <td><?= htmlspecialchars($row['reservation_code']); ?></td>
                        <td><?= htmlspecialchars($row['name']); ?></td>
                        <td><?= htmlspecialchars($row['phone_number']); ?></td>
                        <td><?= htmlspecialchars($row['date']); ?></td>
                        <td><?= htmlspecialchars($row['time']); ?></td>
                        <td><?= htmlspecialchars($row['number_of_guests']); ?> Guests</td>
                        <td><?= htmlspecialchars($row['occasion']); ?></td>
                        <td><?= htmlspecialchars($row['notes']); ?></td>
                        <td><?= htmlspecialchars($row['status']); ?></td>
                        <td>
                            <form action="update_reservation_status.php" method="POST">
                                <input type="hidden" name="reservation_id" value="<?= $row['reservation_id']; ?>">
                                <select name="status">
                                    <option value="Pending" <?= ($row['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Confirmed" <?= ($row['status'] == 'Confirmed') ? 'selected' : ''; ?>>Confirmed</option>
                                    <option value="Cancelled" <?= ($row['status'] == 'Cancelled') ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                                <button type="submit">Update</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='11' class='no-data'>No reservation records found.</td></tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</body>
</html>
