<!DOCTYPE html>
<html>
<head>
    <title>User Gender Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    // Database connection
    include('conn.php');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query data from the database
    $query = "SELECT gender, COUNT(*) as count FROM user GROUP BY gender";
    $result = mysqli_query($con, $query);

    $genderData = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $genderData[$row['gender']] = $row['count'];
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <h2>User Gender Statistic</h2>
    <canvas id="genderChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('genderChart').getContext('2d');
        var genderData = <?php echo json_encode($genderData); ?>;

        var chartData = {
            labels: Object.keys(genderData),
            datasets: [{
                data: Object.values(genderData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)'
                ],
                borderWidth: 1
            }]
        };

        var genderChart = new Chart(ctx, {
            type: 'bar',
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
