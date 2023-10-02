<!DOCTYPE html>
<html>
<head>
    <title>Booking Count Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    // Database connection
    include('conn.php');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query data from Table 1
    $queryHotel = "SELECT COUNT(*) as count FROM hotel_booking";
    $resultHotel = mysqli_query($con, $queryHotel);
    $countHotel = mysqli_fetch_assoc($resultHotel)['count'];

    // Query data from Table 2
    $queryTransport = "SELECT COUNT(*) as count FROM transportation_booking";
    $resultTransport = mysqli_query($con, $queryTransport);
    $countTransport = mysqli_fetch_assoc($resultTransport)['count'];

    // Close the database connection
    mysqli_close($con);
    ?>

    <h2>Booking Count</h2>
    <canvas id="areaChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('areaChart').getContext('2d');
        var chartData = {
            labels: ['Hotel', 'Transport'],
            datasets: [{
                label: 'Booking Count',
                data: [<?php echo $countTable1; ?>, <?php echo $countTable2; ?>],
                fill: true,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        };

        var areaChart = new Chart(ctx, {
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
