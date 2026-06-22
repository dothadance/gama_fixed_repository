<?php
$selected_package = isset($_GET['package']) ? htmlspecialchars($_GET['package']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Event Package - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="css/index2style.css"> 
</head>
<body>

    <div class="dashboard-section">
        <div class="dashboard-container">
            
            <div class="dashboard-header">
                <h1>Event Booking</h1>
                <p>Lock your special date with Gajah Mada Restaurant</p>
            </div>

            <form action="insert_event.php" method="POST">
                
                <div class="event-form-group">
                    <label>SELECTED PACKAGE</label>
                    <input type="text" name="event_type" value="<?= $selected_package; ?>" readonly required>
                </div>

                <div class="event-form-group">
                    <label>YOUR FULL NAME</label>
                    <input type="text" name="name" placeholder="e.g., Thanya" required autocomplete="off">
                </div>

                <div class="event-form-group">
                    <label>PHONE NUMBER</label>
                    <input type="tel" name="phone_number" placeholder="e.g., 08115631222" required autocomplete="off">
                </div>

                <div class="event-form-group">
                    <label>EVENT DATE</label>
                    <input type="date" name="event_date" required>
                </div>

                <button type="submit" class="admin-btn">CONFIRM BOOKING</button>
                
                <a href="page2.php" class="back-link">← Cancel and go back</a>

            </form>

        </div>
    </div>

</body>
</html>