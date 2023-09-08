<?php
// Start or resume the session
session_start();

include('navi_bar.php');
include('conn.php');

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

        // Insert the rating and feedback into the "rating" table
        $insert_query = "INSERT INTO rating (rating_id, user_id, total_stars_rating, feedback_description) VALUES ('', '$user_id', '$rating', '$feedback')";

        if (mysqli_query($con, $insert_query)) {
            echo "<script>alert('Rating and feedback submitted successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating and Feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Rate and Provide Feedback</h1>
    </header>
    <div id="rating-container">
        <h2>Give a Rating and Feedback</h2>
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
