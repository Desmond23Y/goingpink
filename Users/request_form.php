<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php'); // Redirect to the login page if not logged in
    exit();
}
include("../conn.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];

    $result = mysqli_query($con, "SELECT support_id FROM support ORDER BY RAND() LIMIT 1");
    $row = mysqli_fetch_assoc($result);
    $spt_id = $row['support_id'];
    $sql = "INSERT INTO ticket (support_id, user_id, contact_name, support_type, ticket_description, ticket_status) VALUES ('$spt_id', '$user_id', '$_POST[name]', '$_POST[support]', '$_POST[description]', 'Created')";

    if (!mysqli_query($con, $sql)) {
        die('Error:' . mysqli_error($con));
    } else {
        echo "<script>alert('This form has been submitted!');</script>";
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Support Request Form</title>
    <link rel="stylesheet" href="Requestform.css">
    <style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');
    </style>
</head>

<body>
    <?php
        include('../navi_bar.php');
    ?>
    <section class="request-form">
        <h2>Help Request Form</h2>

        <form id="request-form" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required="required"><br>

            <label for="support type">Choose a support type:</label>
            <select name="support" id="support" required="required">
                <option value="">Please select a support type</option>
                <option value="Technical">Technical</option>
                <option value="Payment and Billing Support">Payment and Billing Support</option>
                <option value="Feedback and Complaint Resolution">Feedback and Complaint</option>
                <option value="Others">Others</option>
            </select><br>

            <label for="description">Description:</label>
            <textarea id="text" name="description" rows="5" cols="50" required="required"></textarea><br>

            <button type="submit" value="Submit" style="margin-top: 10px;">Submit Form</button>
        </form><br>
    </section>
</body>
</html>
