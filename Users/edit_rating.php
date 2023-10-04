<?php
// Start or resume the session
session_start();

include('../navi_bar.php');
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_rating = $_POST['new_rating'];
    $new_feedback = $_POST['new_feedback'];

    // Validate user inputs
    if (empty($new_rating) || empty($new_feedback)) {
        echo "<script>alert('Rating and feedback are required.');</script>";
    } else {
        // Get user information from the session
        $user_type = $_SESSION['user_type'];
        $user_id = $_SESSION['user_id'];

        $current_datetime = date("Y-m-d H:i:s");

        // Update the rating and feedback in the "rating" table
        $update_query = "UPDATE rating SET total_stars_rating = '$new_rating', feedback_description = '$new_feedback', rating_date = '$current_datetime' WHERE user_id = '$user_id'";

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Rating and feedback updated successfully!');</script>";
        } else {
            echo "Error updating rating and feedback: " . mysqli_error($con);
        }
    }
}

// Retrieve the user's existing rating and feedback
$user_id = $_SESSION['user_id'];
$select_query = "SELECT total_stars_rating, feedback_description FROM rating WHERE user_id = '$user_id'";
$result = mysqli_query($con, $select_query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Error retrieving rating and feedback: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating and Feedback</title>
    <link rel="stylesheet" href="Editrating.css">
</head>
<body>
    <header>
        <h1>Edit Rating and Feedback</h1>
    </header>
    <div id="edit-rating-container">
        <form id="edit-rating-form" method="POST" action="">
            <label for="new_rating">New Rating (1-5):</label>
            <input type="number" id="new_rating" name="new_rating" min="1" max="5" value="<?php echo isset($row['total_stars_rating']) ? $row['total_stars_rating'] : ''; ?>" required><br><br>

            <label for="new_feedback">New Feedback:</label>
            <textarea id="new_feedback" name="new_feedback" rows="4" cols="50" required><?php echo isset($row['feedback_description']) ? $row['feedback_description'] : ''; ?></textarea><br><br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
