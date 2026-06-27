<?php
session_start();
include "koneksi.php"; 

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) === 1) {
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $username;
    header("Location: admin/dashboard.php");
    exit;
} else {
    header("Location: login.php?pesan=gagal");
    exit;
}
?>