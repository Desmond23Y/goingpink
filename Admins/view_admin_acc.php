<?php
// Start a session (must be the first thing in the script)
session_start();

// Include the database connection file
include("../conn.php");

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php'); // Redirect to the login page if not authenticated
    exit(); // Terminate script execution
}

// Execute a MySQL query to fetch admin records
$result = mysqli_query($con, "SELECT * FROM admin");


?>

<!DOCTYPE html>
<html>
<head>
    <title>View Admin Accounts</title>
    <link rel="stylesheet" href="viewhmgtacc.css">
</head>
<body>
    <?php
        include("Navi_bar_admin.php");
    ?>
    <div class="button">
        <a href="create_admin_acc.php">Add New Admin Account</a><br>
    </div>

    <table width="90%">
        <tr bgcolor="#FFB6C1">
            <th>Admin ID</th>
            <th>Username</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row["admin_id"] . '</td>';
            echo '<td>' . $row["username"] . '</td>';
            echo '<td><a href="modify_admin_acc.php?admin_id=' . $row["admin_id"] . '">Edit</a></td>';
            echo '<td><a onclick="return confirm(\'Delete ' . $row["username"] . ' details?\')" href="delete_admin_acc.php?admin_id=' . $row["admin_id"] . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>

    <?php
    // Close the MySQL database connection
    mysqli_close($con);
    ?>
</body>
</html>
