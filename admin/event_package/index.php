<?php
$conn = mysqli_connect("localhost", "root", "", "gajahmada_restaurant");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Package Management Board</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">
</head>
<body>

<div class="management-container">
    <h2>Event Package Management Board</h2>
    <a href="../dashboard.php" class="btn-back">← Back to Dashboard</a>

    <table class="event-table">
        <thead>
            <tr>
                <th>EVENT TYPE</th>
                <th>NAME</th>
                <th>PHONE NUMBER</th>
                <th>EVENT DATE</th>
                <th>STATUS</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM event_reservation ORDER BY event_date DESC";
            $result = mysqli_query($conn, $query); 

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['package_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($row['event_date']); ?></td>
                        <td>
                            <span class="status-badge <?php echo strtolower($row['status']); ?>">
                                <?php echo htmlspecialchars($row['status']); ?>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5' style='text-align:center;'>Belum ada data reservasi.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <h2 class="stats-title">Event Statistics</h2>
    
    <table class="stats-table">
        <thead>
            <tr>
                <th>Package Name</th>
                <th>Total Orders</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query_stats = "SELECT package_name, COUNT(*) as total FROM event_reservation GROUP BY package_name";
            $result_stats = mysqli_query($conn, $query_stats);

            if (mysqli_num_rows($result_stats) > 0) {
                while ($stat = mysqli_fetch_assoc($result_stats)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($stat['package_name']); ?></td>
                        <td><?php echo $stat['total']; ?></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='2' style='text-align:center;'>Tidak ada statistik data.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>