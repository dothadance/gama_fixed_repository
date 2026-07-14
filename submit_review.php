<?php
include "koneksi.php";

$name = mysqli_real_escape_string($conn, $_POST['review_name']);
$comment = mysqli_real_escape_string($conn, $_POST['review_message']);

// karena belum ada fitur rating
$rating = 5;

$sql = "INSERT INTO review (customer_name, rating, comment)
        VALUES ('$name', '$rating', '$comment')";

if(mysqli_query($conn, $sql)){
    header("Location: index2.php?review=success");
    exit();
}else{
    echo "Error: " . mysqli_error($conn);
}
?>