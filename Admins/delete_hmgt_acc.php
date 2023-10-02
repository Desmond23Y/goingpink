<?php
include("conn.php");

$hotel_manager_id = $_GET['hotel_manager_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM hotel_management WHERE hotel_manager_id='$hotel_manager_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Hotel Manager account deleted successfully.";
} else {
    echo "Error deleting hotel manager account: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: view_hmgt_acc.php');
?>

