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
            <h1>Welcome to the Admin Dashboard</h1>
            <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! You are logged in as the Gajah Mada Restaurant Administrator.</p>
        </div>

        <div class="admin-grid">
            <div class="admin-card">
                <h3>Event Package Management</h3>
                <p>Manage event package bookings, including event details, customer information, event dates, and reservation status.</p>
                <a href="event_package/index.php" class="admin-btn">Review Event</a>
            </div>

            <div class="admin-card">
                <h3>Customer Reservations</h3>
                <p>Review and confirm reservation requests submitted by customers.</p>
                <a href="registrations/index.php" class="admin-btn">Review Reservations</a>
            </div>
        </div>

        <div class="logout-wrapper">
            <a href="logout.php" class="btn-logout-admin">End the current session (Logout)</a>
        </div>
    </div>
</section>
