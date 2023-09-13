<?php
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve POST data
    $transportType = $_POST['transport_type'];

    // Query the transport_information table to retrieve the transport_id
    $query = "SELECT transport_id FROM transport_information WHERE transport_type = ?";
    $stmt = mysqli_prepare($con, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $transportType);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $transportId);

        if (mysqli_stmt_fetch($stmt)) {
            echo json_encode(['transport_id' => $transportId]);
            exit();
        }
    }
}

echo json_encode(['transport_id' => null]);
?>
