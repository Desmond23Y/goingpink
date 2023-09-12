<?php
session_start();
include('conn.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Initialize a variable to store the selected transport ID
$selectedtransportID = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_transport'])) {
    // If a transport is selected for booking, store its ID in the session
    $selectedtransportID = $_POST['book_transport'];
    $_SESSION['selected_transport_id'] = $selectedtransportID;

    // Redirect to the invoice page
    header('Location: invoice.php');
    exit();
}

// Include the navigation bar (moved here to avoid output before header)
include('navi_bar.php');

$result = mysqli_query($con, "SELECT * FROM transport_information");
if (!$result) {
    die('Query Error: ' . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Going Pink transport Viewing</title>
    <link rel="stylesheet" href="style_booking.css">
</head>
<body>
    <header>
        <h1>Transport Viewing</h1>
    </header>

    <div class="box">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<h3> Transport Type: ' . $row["transport_type"] . '</h3>';
                echo '<h3> Transport Availability: ' . $row["transport_availability"] . '</h3>';
                echo '<h3> Transport Price: ' . $row["transport_price"] . '</h3>';
                echo '<form method="POST" action="">';
                echo '<button type="submit" name="book_transport" value="' . $row["transport_id"] . '">Book This Transportation</button>';
                echo '</form>';
                }
            }
        } else {
            echo "Transport is not available.";
        }
        ?>
    </div>
</body>
</html>
