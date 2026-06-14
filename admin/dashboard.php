<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login.php"); 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="../css/page1style.css">
    <link rel="stylesheet" href="../css/adminstyle.css">
</head>
<body>

<section class="dashboard-section">
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Selamat Datang di Panel Admin</h1>
            <p>Halo, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Anda masuk sebagai Administrator Gajah Mada Restaurant.</p>
        </div>

        <div class="admin-grid">
            <div class="admin-card">
                <h3>Manajemen Menu / Courses</h3>
                <p>Tambah, ubah, atau hapus daftar menu makanan dan minuman restoran.</p>
                <a href="courses/index.php" class="admin-btn">Kelola Menu</a>
            </div>

            <div class="admin-card">
                <h3>Daftar Registrasi / Reservasi</h3>
                <p>Lihat dan konfirmasi data reservasi tempat dari pelanggan.</p>
                <a href="registrations/index.php" class="admin-btn">Kelola Registrasi</a>
            </div>
        </div>

        <div class="logout-wrapper">
            <a href="logout.php" class="btn-logout-admin">Keluar dari Sistem (Logout)</a>
        </div>
    </div>
</section>
