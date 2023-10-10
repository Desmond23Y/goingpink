<?php
include('conn.php'); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the selected transport_type from the AJAX request
    $transportType = $_POST['transport_type'];

    // Query to retrieve the transport_id based on transport_type
    $query = "SELECT transport_id FROM transport_information WHERE transport_type = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $transportType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $transportId);
        mysqli_stmt_fetch($stmt);

        if ($transportId) {
            // Return the transport_id as a JSON response
            echo json_encode(['transport_id' => $transportId]);
        } else {
            echo json_encode(['transport_id' => null]);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo json_encode(['transport_id' => null]);
    }
} else {
    echo json_encode(['transport_id' => null]);
}
?>
