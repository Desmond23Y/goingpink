<?php
session_start();
include('conn.php');


if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}


include('../navi_bar.php');
?>


<!DOCTYPE html>
<html>
<head>
    <title>View Tickets</title>
    <link rel="stylesheet" href="userviewticket.css">
</head>
<body>
    <header>
        <h1>View Tickets</h1>
    </header>

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
                echo '<div class="ticket">';
                echo '<h3>Ticket ID: ' . $ticket_row["ticket_id"] . '</h3>';
                echo '<p>Contact Name: ' . $ticket_row["contact_name"] . '</p>';
                echo '<p>Support Type: ' . $ticket_row["support_type"] . '</p>';
                echo '<p>Description: ' . $ticket_row["ticket_description"] . '</p>';
                echo '<p>Status: ' . $ticket_row["ticket_status"] . '</p>';
                echo '<p>Priority: ' . $ticket_row["ticket_priority"] . '</p>';
                echo '<p>Solution: ' . $ticket_row["ticket_solution"] . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No tickets available.</p>";
        }
        ?>
    </div>
</body>
</html>

