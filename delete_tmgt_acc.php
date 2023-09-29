<?php
include("conn.php");

$transport_manager_id = $_GET['transport_manager_id'];

// Use single quotes for string values in SQL queries
$result = mysqli_query($con, "DELETE FROM transport_management WHERE transport_manager_id='$transport_manager_id'");

if ($result) {
    // Optionally display a success message here if needed
    // echo "Transport Manager account deleted successfully.";
} else {
    echo "Error deleting transport manager account: " . mysqli_error($con);
}

mysqli_close($con);
header('Location: view_tmgt_acc.php');
?>
