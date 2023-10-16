<!DOCTYPE html>
<html>
<head>
    <title>Star Rating Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="reportstarrating.css">
</head>
<body>
    <?php
    // Database connection
    include("../conn.php");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query data from the "rating" table
    $query = "SELECT total_stars_rating, COUNT(*) as count FROM rating GROUP BY total_stars_rating";
    $result = mysqli_query($con, $query);

    // Initialize arrays to store data
    $starRatings = [];
    $ratingCounts = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $starRatings[] = $row['total_stars_rating'];
        $ratingCounts[] = $row['count'];
    }

    // Close the database connection
    mysqli_close($con);

    include("Navi_generate_report.php");
    ?>

    <h2>Star Rating Statistics</h2>
    <canvas id="barChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('barChart').getContext('2d');
        var chartData = {
            labels: <?php echo json_encode($starRatings); ?>,
            datasets: [{
                label: 'Star Rating Counts',
                data: <?php echo json_encode($ratingCounts); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Bar color
                borderColor: 'rgba(75, 192, 192, 1)', // Border color
                borderWidth: 1
            }]
        };

        var barChart = new Chart(ctx, {
            type: 'bar', // Change type to 'bar'
            data: chartData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
