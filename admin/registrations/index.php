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

    <?php
    $search = "";
    $statusFilter = "";
    $sort = "date_desc";

    // Search
    if(isset($_GET['search'])){
        $search = mysqli_real_escape_string($conn, $_GET['search']);
    }

    // Status Filter
    if(isset($_GET['status'])){
        $statusFilter = mysqli_real_escape_string($conn, $_GET['status']);
    }

    // Sort
    if(isset($_GET['sort'])){
        $sort = $_GET['sort'];
    }
    ?>

<form method="GET" class="search-form">

    <!-- Search -->
    <input
        type="text"
        name="search"
        placeholder="🔍 Search Reservation Code, Customer Name, or Phone Number..."
        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
    >

    <!-- Status Filter -->
    <select name="status">
        <option value="">All Status</option>

        <option value="Pending"
            <?= (isset($_GET['status']) && $_GET['status']=="Pending") ? "selected" : ""; ?>>
            Pending
        </option>
        <option value="Confirmed"
            <?= (isset($_GET['status']) && $_GET['status']=="Confirmed") ? "selected" : ""; ?>>
            Confirmed
        </option>
        <option value="Cancelled"
            <?= (isset($_GET['status']) && $_GET['status']=="Cancelled") ? "selected" : ""; ?>>
            Cancelled
        </option>
    </select>
    <button type="submit">
        Search
    </button>
    <a href="index.php">
        Reset
    </a>

    <!-- Sort by Date -->
<div class="sort-wrapper">

    <select name="sort">
        <option value="date_desc"
            <?= ($sort=="date_desc") ? "selected" : ""; ?>>
            Newest Date
        </option>

        <option value="date_asc"
            <?= ($sort=="date_asc") ? "selected" : ""; ?>>
            Oldest Date
        </option>
    </select>

</div>

</form>

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

        // Base Query
        $sql = "SELECT * FROM reservation WHERE 1=1";

        // Search
        if($search != ""){
            $sql .= " AND (
                reservation_code LIKE '%$search%'
                OR name LIKE '%$search%'
                OR phone_number LIKE '%$search%'
            )";
        }

        // Status Filter
        if($statusFilter != ""){
            $sql .= " AND status = '$statusFilter'";
        }

        // Sort
        switch($sort){

            case "oldest":
                $sql .= " ORDER BY reservation_id ASC";
                break;

            case "date_asc":
                $sql .= " ORDER BY date ASC, time ASC";
                break;

            case "date_desc":
                $sql .= " ORDER BY date DESC, time DESC";
                break;

            default:
                $sql .= " ORDER BY reservation_id DESC";
                break;
        }

        $result = mysqli_query($conn, $sql);

        if($result && mysqli_num_rows($result) > 0){

            while($row = mysqli_fetch_assoc($result)){

                $status = $row['status'];

                if($status == "Pending"){
                    $badgeClass = "pending";
                }elseif($status == "Confirmed"){
                    $badgeClass = "success";
                }elseif($status == "Cancelled"){
                    $badgeClass = "cancelled";
                }else{
                    $badgeClass = "";
                }
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
            <!-- current status !-->
            <td>
                <span class="status-badge <?= $badgeClass; ?>">
                    <?= htmlspecialchars($status); ?>
                </span>
            </td>

            <!-- change status !-->
            <td>
                <form action="update_reservation_status.php" method="POST" class="status-form">
                    <input
                        type="hidden"
                        name="reservation_id"
                        value="<?= $row['reservation_id']; ?>"
                    >
                    <select name="status">
                        <option value="Pending" <?= ($status == "Pending") ? "selected" : ""; ?>>
                            Pending
                        </option>
                        <option value="Confirmed" <?= ($status == "Confirmed") ? "selected" : ""; ?>>
                            Confirmed
                        </option>
                        <option value="Cancelled" <?= ($status == "Cancelled") ? "selected" : ""; ?>>
                            Cancelled
                        </option>
                    </select>
                    <button type="submit">
                        Update
                    </button>
                </form>
            </td>
        </tr>
        <?php
            }
        }else{
            echo "<tr>
                    <td colspan='11' class='no-data'>
                        No reservation records found.
                    </td>
                  </tr>";
        }
        ?>
        </tbody>
    </table>
</div>

</body>
</html>
