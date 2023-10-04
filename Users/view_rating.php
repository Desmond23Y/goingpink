<?php
// Start or resume the session
session_start();

include('../navi_bar.php');
include('conn.php');

// Check if the database connection is successful
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Determine the current page
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Number of ratings to display per page
$ratings_per_page = 10;

// Calculate the starting index for retrieving ratings
$start_index = ($current_page - 1) * $ratings_per_page;

// Query to retrieve ratings with pagination
$query = "SELECT * FROM rating LIMIT $start_index, $ratings_per_page";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Error fetching ratings: " . mysqli_error($con));
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Ratings</title>
    <link rel="stylesheet" href="view_rating.css">
    <style>
     @import url('https://fonts.cdnfonts.com/css/butler');
     @import url('https://fonts.cdnfonts.com/css/futura-pt');
    </style>

</head>
<body>
    <header>
        <h1>View Ratings</h1>
    </header>
    <div id="ratings-container">
        <h2>Recent Ratings and Feedback</h2>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <li class="box">
                    <strong>Rating:</strong> <?php echo $row['total_stars_rating']; ?><br>
                    <strong>Feedback:</strong> <?php echo $row['feedback_description']; ?><br>
                    <strong>Date:</strong> <?php echo $row['rating_date']; ?>
                </li>
            <?php } ?>
        </ul>
        
        <?php
        // Pagination links
        $query = "SELECT COUNT(*) AS total_ratings FROM rating";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Error fetching total ratings: " . mysqli_error($con));
        }

        $row = mysqli_fetch_assoc($result);
        $total_ratings = $row['total_ratings'];
        $total_pages = ceil($total_ratings / $ratings_per_page);

        // Display pagination links
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='view_rating.php?page=$i'>$i</a> ";
        }
        ?>
    </div>
</body>
</html>

<?php
// Close the database connection
mysqli_close($con);
?>
