<?php
include "../../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews - Gajah Mada Restaurant</title>
    <link rel="stylesheet" href="../../css/adminstyle.css">
</head>
<body>

<div class="container">

    <a href="../dashboard.php" class="btn-back">&larr; Back to Dashboard</a>

    <h2>Customer Reviews</h2>

<?php

$search = "";
$statusFilter = "";
$sort = "newest";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
}

if(isset($_GET['status'])){
    $statusFilter = mysqli_real_escape_string($conn, $_GET['status']);
}

if(isset($_GET['sort'])){
    $sort = $_GET['sort'];
}

?>

<form method="GET" class="search-form">

    <!-- Search -->
    <input
        type="text"
        name="search"
        placeholder="🔍 Search customer name or review..."
        value="<?= htmlspecialchars($search); ?>"
    >

    <!-- Rating Filter -->
    <select name="status">
        <option value="">All Ratings</option>

        <option value="5" <?= ($statusFilter=="5") ? "selected" : ""; ?>>
            ★★★★★
        </option>

        <option value="4" <?= ($statusFilter=="4") ? "selected" : ""; ?>>
            ★★★★☆
        </option>

        <option value="3" <?= ($statusFilter=="3") ? "selected" : ""; ?>>
            ★★★☆☆
        </option>

        <option value="2" <?= ($statusFilter=="2") ? "selected" : ""; ?>>
            ★★☆☆☆
        </option>

        <option value="1" <?= ($statusFilter=="1") ? "selected" : ""; ?>>
            ★☆☆☆☆
        </option>
    </select>

    <button type="submit">
        Search
    </button>

    <a href="index.php">
        Reset
    </a>

    <!-- Sort -->
    <div class="sort-wrapper">
        <select name="sort">

            <option value="newest" <?= ($sort=="newest") ? "selected" : ""; ?>>
                Newest
            </option>

            <option value="oldest" <?= ($sort=="oldest") ? "selected" : ""; ?>>
                Oldest
            </option>

            <option value="highest" <?= ($sort=="highest") ? "selected" : ""; ?>>
                Highest Rating
            </option>

            <option value="lowest" <?= ($sort=="lowest") ? "selected" : ""; ?>>
                Lowest Rating
            </option>

        </select>
    </div>

</form>

<table>

<thead>
<tr>
    <th>ID</th>
    <th>Customer Name</th>
    <th>Rating</th>
    <th>Review</th>
    <th>Submitted At</th>
</tr>
</thead>

<tbody>

<?php

$sql = "SELECT * FROM review WHERE 1=1";

if($search != ""){
    $sql .= " AND (
        customer_name LIKE '%$search%'
        OR comment LIKE '%$search%'
    )";
}

if($statusFilter != ""){
    $sql .= " AND rating = '$statusFilter'";
}

switch($sort){

    case "oldest":
        $sql .= " ORDER BY created_at ASC";
        break;

    case "highest":
        $sql .= " ORDER BY rating DESC, created_at DESC";
        break;

    case "lowest":
        $sql .= " ORDER BY rating ASC, created_at DESC";
        break;

    default:
        $sql .= " ORDER BY created_at DESC";
        break;
}

$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_assoc($result)){
?>

<tr>

    <td><?= $row['review_id']; ?></td>

    <td><?= htmlspecialchars($row['customer_name']); ?></td>

    <td>
        <span style="color:#FFD700;">
            <?= str_repeat("★", $row['rating']); ?>
        </span>
    </td>

    <td><?= htmlspecialchars($row['comment']); ?></td>

    <td><?= htmlspecialchars($row['created_at']); ?></td>

</tr>

<?php
    }

}else{

    echo "
    <tr>
        <td colspan='5' class='no-data'>
            No reviews found.
        </td>
    </tr>";

}

?>

</tbody>

</table>

</div>

</body>
</html>