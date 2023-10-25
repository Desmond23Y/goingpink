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
    <style>
            table {
        width: 90%;
        border-collapse: collapse;
        margin: 20px auto; 
        }

    th, td {
        border: 1px solid #FFB6C1;
        padding: 8px;
        text-align: left;
        }
        
    td{
        font-family: Futura, sans-serif;
        }
        
    tr:nth-child(even) {
        background-color: #FFE6E6;
        }
        
    th {
        background-color: #E9204F;
        color: white;    
        }    

    tr:nth-child(odd) {
        background-color: #FFF3F3;
        }        

    td a {
        display: inline-block;
        padding: 6px 10px;
        margin: 2px;
        color: white;
        background-color: #E9204F;
        text-decoration: none;
        border: 1px solid #65313D;
        border-radius: 3px;
        }    

    td a:hover {
        background-color: #FF5A7D;
        color: white;
        border: 1px solid #65313D;
        }
    </style>
    </style>

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
