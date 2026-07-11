<?php
include "koneksi.php";

function generateEventCode($conn) {
    do {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = 'GAMA-EVNT-';
        for ($i = 0; $i < 4; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }
        $check = mysqli_query($conn, "SELECT event_id FROM event_reservation WHERE event_code = '$code'");
    } while (mysqli_num_rows($check) > 0);
    return $code;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_type = mysqli_real_escape_string($conn, $_POST['event_type']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $event_date = mysqli_real_escape_string($conn, $_POST['event_date']);
    
    $event_code = generateEventCode($conn);
    $status = 'Pending';

    $sql = "INSERT INTO event_reservation (event_code, event_type, name, phone_number, event_date, status) 
            VALUES ('$event_code', '$event_type', '$name', '$phone', '$event_date', '$status')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('🎉 Booking Successful for $event_type!\\n\\nYour Event Code is: [ $event_code ]\\nSave this code for verification.');
                window.location.href='page2.php';
              </script>";
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>