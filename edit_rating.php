<?php
// Start or resume the session
session_start();

include('navi_bar.php');
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_rating = $_POST['new_rating'];
    $new_feedback = $_POST['new_feedback'];
    $rating_id = $_POST['rating_id'];

    // Validate user inputs
    if (empty($new_rating) || empty($new_feedback)) {
        echo "<script>alert('Rating and feedback are required.');</script>";
    } else {
        // Update the rating and feedback in the "rating" table
        $update_query = "UPDATE rating SET total_stars_rating = '$new_rating', feedback_description = '$new_feedback' WHERE id = '$rating_id'";

        if (mysqli_query($con, $update_query)) {
            echo "<script>alert('Rating and feedback updated successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

// Retrieve the user's existing ratings and feedback
$user_id = $_SESSION['user_id'];
$select_query = "SELECT id, total_stars_rating, feedback_description FROM rating WHERE user_id = '$user_id'";
$result = mysqli_query($con, $select_query);

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Rating and Feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Edit Rating and Feedback</h1>
    </header>
    <div id="edit-rating-container">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <form method="POST" action="">
                <input type="hidden" name="rating_id" value="<?php echo $row['id']; ?>">
                <label for="new_rating">Rating (1-5):</label>
                <input type="number" id="new_rating" name="new_rating" min="1" max="5" value="<?php echo $row['total_stars_rating']; ?>" required><br><br>

                <label for="new_feedback">Feedback:</label>
                <textarea id="new_feedback" name="new_feedback" rows="4" cols="50" required><?php echo $row['feedback_description']; ?></textarea><br><br>

                <button type="submit">Update</button>
            </form>
        <?php } ?>
    </div>
</body>
</html>
