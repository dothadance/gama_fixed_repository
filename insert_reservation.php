<?php
include "koneksi.php";

$name = $_POST['name'];
$phone = $_POST['phone_number'];
$date = $_POST['date'];
$time = $_POST['time'];
$guests = $_POST['number_of_guests'];
$occasion = $_POST['occasion'];
$notes = $_POST['notes'];

$sql = "INSERT INTO reservations (admin_id, name, phone_number, date, time, number_of_guests, occasion, notes) 
        VALUES (NULL, '$name', '$phone', '$date', '$time', '$guests', '$occasion', '$notes')";

if (mysqli_query($conn, $sql)) {
    $last_id = mysqli_insert_id($conn); 
    header("Location: index1.php?status=success&id=" . $last_id);
    exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
?>