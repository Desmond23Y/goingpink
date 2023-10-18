<?php
session_start();
include("../conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
    <link rel="stylesheet" href="userviewticket.css">
    <style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');
    </style>
</head>
<body>
    <?php
        include('../navi_bar.php');
    ?>
        <h1>View Tickets</h1>

    <div class="ticket-list">
        <?php
        $user_id = $_SESSION['user_id'];

        // Retrieve the user's tickets from the database
        $ticket_query = "SELECT ticket_id, contact_name, support_type, ticket_description, ticket_status, ticket_priority, ticket_solution FROM ticket WHERE user_id = '$user_id'";
        $ticket_result = mysqli_query($con, $ticket_query);

        if (!$ticket_result) {
            die('Query Error: ' . mysqli_error($con));
        }

        if (mysqli_num_rows($ticket_result) > 0) {
            while ($ticket_row = mysqli_fetch_assoc($ticket_result)) {
                echo '<div class="box">';
                echo '<h3>Ticket ID: ' . $ticket_row["ticket_id"] . '</h3>';
                echo '<p><b>Contact Name:</b> ' . $ticket_row["contact_name"] . '</p>';
                echo '<p><b>Support Type:</b>  ' . $ticket_row["support_type"] . '</p>';
                echo '<p><b>Description:</b>  ' . $ticket_row["ticket_description"] . '</p>';
                echo '<p><b>Status:</b>  ' . $ticket_row["ticket_status"] . '</p>';
                echo '<p><b>Priority:</b>  ' . $ticket_row["ticket_priority"] . '</p>';
                echo '<p><b>Solution: </b> ' . $ticket_row["ticket_solution"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No tickets available.</p>";
        }
        ?>
    </div>
</body>
</html>

