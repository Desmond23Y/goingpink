<?php
include("../conn.php");

$user_id = $_GET['user_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM user WHERE user_id='$user_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "User account deleted successfully.";
} else {
    echo "Error deleting user account: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: view_user_acc.php');
?>
