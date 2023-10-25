<?php
session_start();
include("../conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result = mysqli_query($con, "SELECT * FROM ticket");
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
    <link rel="stylesheet" href=""generatereport.css">

<body>
    <table>
        <tr bgcolor="F6C7C2">
            <th>Ticket ID</th>
            <th>Support ID</th>
            <th>User ID</th>
            <th>Contact Name</th>
            <th>Support Type</th>
            <th>Ticket Description</th>
            <th>Ticket Status</th>
            <th>Ticket Priority</th>
            <th>Ticket Solution</th>
            <th>Edit</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr>';
            echo '<td>' . $row["ticket_id"] . '</td>';
            echo '<td>' . $row["support_id"] . '</td>';
            echo '<td>' . $row["user_id"] . '</td>';
            echo '<td>' . $row["contact_name"] . '</td>';
            echo '<td>' . $row["support_type"] . '</td>';
            echo '<td>' . $row["ticket_description"] . '</td>';
            echo '<td>' . $row["ticket_status"] . '</td>';
            echo '<td>' . $row["ticket_priority"] . '</td>';
            echo '<td>' . $row["ticket_solution"] . '</td>';
            echo '<td><a href="update_ticket.php?ticket_id=' . $row["ticket_id"] . '">Edit</a></td>';
            echo '</tr>';
        }
        mysqli_close($con);
        ?>
    </table>
</body>
</html>
