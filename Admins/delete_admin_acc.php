<?php
include("../conn.php");

$admin_id = $_GET['admin_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM admin WHERE admin_id='$admin_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Admin account deleted successfully.";
} else {
    echo "Error deleting admin account: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: view_admin_acc.php');
?>

