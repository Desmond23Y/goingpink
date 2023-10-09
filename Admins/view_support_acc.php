<?php
// Start a session (must be the first thing in the script)
session_start();

// Include the database connection file
include("conn.php");

// Check if the user is authenticated
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php'); // Redirect to the login page if not authenticated
    exit(); // Terminate script execution
}

include("Navi_bar_admin.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Support Accounts</title>
    <link rel="stylesheet" href="Viewsupportacc.css">
</head>
<body>
    <div class="button">
        <a href="create_support_acc.php">Add New Support Account</a><br>
    </div>

    <table width="90%">
        <tr bgcolor="#FFB6C1">
            <td>Support ID</td>
            <td>Username</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>

        <?php
        // Rest of your PHP code follows here
        $result = mysqli_query($con, "SELECT * FROM support");

        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row["support_id"] . '</td>';
            echo '<td>' . $row["username"] . '</td>';
            echo '<td><a href="modify_support_acc.php?support_id=' . $row["support_id"] . '">Edit</a></td>';
            echo '<td><a onclick="return confirm(\'Delete ' . $row["username"] . ' details?\')" href="delete_support_acc.php?support_id=' . $row["support_id"] . '">Delete</a></td>';
            echo '</tr>';
        }
        // Close the MySQL database connection
        mysqli_close($con);
        ?>
    </table>
</body>
</html>
