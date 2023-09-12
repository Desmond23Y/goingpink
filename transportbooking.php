<?php
session_start();
include('conn.php');

$user_id = $_SESSION['user_id'];
$selected_transport_id = $_SESSION['selected_transport_id'];

// Define departure based on transport type
$departure_location = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['departure_date'])) {
    $departure_date = $_POST['departure_date'];

    // Get the selected transport type from the database
    $get_transport_type_query = "SELECT transport_type FROM transport_information WHERE transport_id = '$selected_transport_id'";
    $result = mysqli_query($con, $get_transport_type_query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo "Selected transport not found.";
    } else {
        $row = mysqli_fetch_assoc($result);
        $transport_type = $row['transport_type'];

        // Set departure based on the transport type
        if ($transport_type == 'Aeroplane') {
            $departure_location = 'KLIA2';
        } else {
            $departure_location = 'Bandar Tasik Selatan';
        }

        // Insert the transport booking with departure
        $transportation_booking_query = "INSERT INTO transportation_booking (user_id, transport_id, departure_date, departure_location) 
                                VALUES ('$user_id', '$selected_transport_id', '$departure_date', '$departure_location')";
        
        if (mysqli_query($con, $transportation_booking_query)) {
            header('Location: index.php');
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
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
