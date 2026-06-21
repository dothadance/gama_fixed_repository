<?php
include "koneksi.php";

function generateReservationCode($conn) {
    do {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = 'GAMA-';

        for ($i = 0; $i < 4; $i++) {
            $code .= $characters[rand(0, strlen($characters) - 1)];
        }

        $check = mysqli_query($conn, "SELECT reservation_id FROM reservation WHERE reservation_code = '$code'");
    } while (mysqli_num_rows($check) > 0);

    return $code;
}

$name = $_POST['name'];
$phone = $_POST['phone_number'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['number_of_guests'];
$occasion = $_POST['occasion'];
$notes = $_POST['notes'];

$reservation_code = generateReservationCode($conn);
$status = 'Pending';

$sql = "INSERT INTO reservation 
        (admin_id, reservation_code, name, phone_number, date, time, number_of_guests, occasion, notes, status) 
        VALUES 
        (NULL, '$reservation_code', '$name', '$phone', '$date', '$time', '$guests', '$occasion', '$notes', '$status')";

if (mysqli_query($conn, $sql)) {
    header("Location: index1.php?status=success&code=" . urlencode($reservation_code));
    exit;
} else {
    echo "Error: " . mysqli_error($conn);
}
