<?php
include("conn.php");

$support_id = $_GET['support_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM support WHERE support_id='$support_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Support account deleted successfully.";
} else {
    echo "Error deleting support account: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: view_support_acc.php');
?>

