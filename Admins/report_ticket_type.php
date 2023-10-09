<!DOCTYPE html>
<html>
<head>
    <title>Support Type Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="reporttickettype.css">
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

    include("Navi_generate_report.php");
    ?>

    <h2>Support Type Statistics</h2>
    <canvas id="lineChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('lineChart').getContext('2d');
        var chartData = {
            labels: <?php echo json_encode($supportTypeLabels); ?>,
            datasets: [{
                label: 'Support Type Counts',
                data: <?php echo json_encode($supportTypeCounts); ?>,
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var lineChart = new Chart(ctx, {
            type: 'line',
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
