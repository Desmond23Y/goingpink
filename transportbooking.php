<?php
session_start();
include('conn.php');

$user_id = $_SESSION['user_id'];
$selected_transport_id = $_SESSION['selected_transport_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['number_of_tickets']) && isset($_POST['departure_date'])) {
    $number_of_tickets = $_POST['number_of_tickets'];
    $departure_date = $_POST['departure_date'];

    // Validate user inputs
    if ($number_of_tickets < 1) {
        echo "Number of tickets must be at least 1.";
    } elseif (strtotime($departure_date) < strtotime(date('Y-m-d'))) {
        echo "Invalid departure date.";
    } else {
        // Check if the selected transport ID exists in the transport_information table
        $check_transport_query = "SELECT * FROM transport_information WHERE transport_id = '$selected_transport_id'";
        $result = mysqli_query($con, $check_transport_query);

        if (mysqli_num_rows($result) == 0) {
            echo "Selected transport not found.";
        } else {
            // Insert the transport booking
            $transport_booking_query = "INSERT INTO transport_booking (user_id, transport_id, departure_date) 
                                    VALUES ('$user_id', '$selected_transport_id', '$departure_date')";
            
            if (mysqli_query($con, $transport_booking_query)) {
                header('Location: viewtransport.php');
            } else {
                echo "Error: " . mysqli_error($con);
            }
        }

        mysqli_close($con);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transport Booking</title>
</head>
<body>
    <h2>Book a Transport</h2>
    <form id="transport-booking-form" method="POST" action="">

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required><br><br>

        <button type="submit">Book Transport</button>
    </form>
    <p id="booking-message"></p>
</body>
</html>

