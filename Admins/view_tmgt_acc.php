<?php
// Start a session (must be the first thing in the script)
session_start();

// Include the database connection file
include("conn.php");

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if not authenticated
    exit(); // Terminate script execution
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Transport Manager Accounts</title>
</head>
<body>
    <a href="create_tmgt_acc.php">Add New Transport Manager Account</a><br>

    <table width="90%">
        <tr bgcolor="#FFB6C1">
            <td>Transport Manager ID</td>
            <td>Username</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>

        <?php
        // Rest of your PHP code follows here
        $result = mysqli_query($con, "SELECT * FROM transport_management");
        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row["transport_manager_id"] . '</td>';
            echo '<td>' . $row["username"] . '</td>';
            echo '<td><a href="modify_tmgt_acc.php?transport_manager_id=' . $row["transport_manager_id"] . '">Edit</a></td>';
            echo '<td><a onclick="return confirm(\'Delete ' . $row["username"] . ' details?\')" href="delete_tmgt_acc.php?transport_manager_id=' . $row["transport_manager_id"] . '">Delete</a></td>';
            echo '</tr>';
        }
        // Close the MySQL database connection
        mysqli_close($con);
        ?>
    </table>
</body>
</html>
