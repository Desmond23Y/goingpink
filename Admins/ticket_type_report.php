<!DOCTYPE html>
<html>
<head>
    <title>Support Type Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    // Database connection
    include('conn.php');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query data for support types
    $querySupportTypes = "SELECT support_type, COUNT(*) as count FROM ticket GROUP BY support_type";
    $resultSupportTypes = mysqli_query($con, $querySupportTypes);

    // Initialize arrays to store data
    $supportTypeLabels = [];
    $supportTypeCounts = [];

    while ($row = mysqli_fetch_assoc($resultSupportTypes)) {
        $supportTypeLabels[] = $row['support_type'];
        $supportTypeCounts[] = $row['count'];
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <h2>Support Type Counts</h2>
    <canvas id="areaChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('areaChart').getContext('2d');
        var chartData = {
            labels: <?php echo json_encode($supportTypeLabels); ?>,
            datasets: [{
                label: 'Support Type Counts',
                data: <?php echo json_encode($supportTypeCounts); ?>,
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)', // Area chart background color
                borderColor: 'rgba(75, 192, 192, 1)', // Border color
                borderWidth: 1
            }]
        };

        var areaChart = new Chart(ctx, {
            type: 'line', // Use 'line' type to create an area chart
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
