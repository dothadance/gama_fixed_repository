<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $code = strtoupper(mysqli_real_escape_string($conn, $_POST['reservation_code']));
    $sql = "DELETE FROM reservation WHERE reservation_code = '$code'";

    if (mysqli_query($conn, $sql)) {
        if (mysqli_affected_rows($conn) > 0) {
            echo "<script>
                    alert('Success! Reservation Code $code has been successfully cancelled.');
                    window.location.href='index1.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Failed! Reservation Code not found. Please check your Code again.');
                    window.location.href='index1.php';
                  </script>";
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>