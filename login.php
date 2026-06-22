<?php 
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: admin/dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="css/page1style.css">
</head>
<body>

<section class="login-section">
    <div class="login-box">
        <h2>Admin Login</h2>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal"): ?>
            <p class="error-msg" style="color: #ff6b6b; text-align: center; font-size: 14px; margin-bottom: 15px; font-weight: bold;">
                Username atau password salah!
            </p>
        <?php endif; ?>

        <form action="sv_login.php" method="post">
            <div class="input-group">
                <input type="text" placeholder="username" name="username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="password" required>
            </div>
            <button type="submit" class="btn-login">login</button>
        </form>
    </div>
</section>

<?php include "footer.php"; ?>