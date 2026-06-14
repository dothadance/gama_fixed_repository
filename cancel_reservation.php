<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['reservation_id']);

    $sql = "DELETE FROM reservations WHERE reservation_id = '$id'";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Success! Reservation ID $id has been successfully cancelled.');
                    window.location.href='index1.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed! Reservation ID not found. Please check your ID again.');
                    window.location.href='index1.php';
                  </script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>