<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$support_id = $_SESSION['support_id'];
include("conn.php");


if (!isset($_SESSION['support_id'])) {
    header('Location: login.php'); // Redirect to the login page if not logged in
    exit();
}

$sql = "INSERT INTO report (support_id, report_title, priority, report_description, report_status) VALUES ('$support_id', '$_POST[title]', '$_POST[priority]', '$_POST[description]', 'Created')";

if(!mysqli_query($con,$sql)) {
    die('Error:' . mysqli_error($con));
}
else {
    echo "<script>alert('This form has been submitted!');</script>";
}

mysqli_close($con);
}
?>
        
<!DOCTYPE html>
<head>
    <title>Report to Admin</title>
</head>

<body>
    <header>
        <h1>Report Form</h1>
    </header>
    
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required="required"><br>

        <label for="priority">Report Priority:</label>
        <select name="priority" id="priority" required="required">
            <option value="">Please select the level of the priority</option>
            <option value="High">High</option>
            <option value="Medium">Medium</option>
            <option value="Low">Low</option>
        </select><br>

        <label for="description">Report Description:</label>
        <textarea id="text" name="description" rows="5" cols="50" required="required"></textarea><br>

        <button type="submit" value="Submit">Submit Form</button>
        
    </form><br>
</body>
</html>
