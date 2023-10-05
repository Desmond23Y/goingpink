<?php
// Start or resume the session
session_start();

include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];

    // Validate user inputs
    if (empty($rating) || empty($feedback)) {
        echo "<script>alert('Rating and feedback are required.');</script>";
    } else {
        // Get user information from the session
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];

        // Get the current date and time in MySQL format (YYYY-MM-DD HH:MM:SS)
        $current_datetime = date("Y-m-d H:i:s");

        // Insert the rating, feedback, and current datetime into the "rating" table
        $insert_query = "INSERT INTO rating (user_id, total_stars_rating, feedback_description, rating_date) VALUES ('$user_id', '$rating', '$feedback', '$current_datetime')";

        if (mysqli_query($con, $insert_query)) {
            echo "<script>alert('Rating and feedback submitted successfully!');</script>";
            header('Location: Users/view_rating.php'); // Redirect to the view_rating.php page
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
include_once('../navi_bar.php');
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating and Feedback</title>
    <link rel="stylesheet" href="Rating.css">
</head>
<body>
    <header>
        <h1>Rate and Provide Feedback</h1>
    </header>
    <div id="rating-container">
        <form id="rating-form" method="POST" action="">
            <label for="rating">Rating (1-5):</label>
            <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>

            <label for="feedback">Feedback:</label>
            <textarea id="feedback" name="feedback" rows="4" cols="50" required></textarea><br><br>

            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
