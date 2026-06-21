<?php
include "../../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reservation_id = isset($_POST['reservation_id']) ? (int)$_POST['reservation_id'] : 0;
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    $allowed_status = ['Pending', 'Confirmed', 'Cancelled'];

    if ($reservation_id > 0 && in_array($status, $allowed_status)) {
        $sql = "UPDATE reservation SET status = '$status' WHERE reservation_id = $reservation_id";

        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Failed to update reservation status: " . mysqli_error($conn);
        }
    } else {
        echo "Invalid reservation status update request.";
    }
} else {
    header("Location: index.php");
    exit;
}
?>
