<!DOCTYPE html>
<html>
<head>
    <title>User Type Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="reportusertype.css">
</head>
<body>
    <?php
    // Database connection
    include('conn.php');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // Query data from Table 1
    $queryUser = "SELECT COUNT(*) as count FROM user";
    $resultUser = mysqli_query($con, $queryUser);
    $countUser = mysqli_fetch_assoc($resultUser)['count'];
    // Query data from Table 2
    $queryAdmin = "SELECT COUNT(*) as count FROM admin";
    $resultAdmin = mysqli_query($con, $queryAdmin);
    $countAdmin = mysqli_fetch_assoc($resultAdmin)['count'];
    // Query data from Table 3
    $querySupport = "SELECT COUNT(*) as count FROM support";
    $resultSupport = mysqli_query($con, $querySupport);
    $countSupport = mysqli_fetch_assoc($resultSupport)['count'];
    // Query data from Table 4
    $queryHmgt = "SELECT COUNT(*) as count FROM hotel_management";
    $resultHmgt = mysqli_query($con, $queryHmgt);
    $countHmgt = mysqli_fetch_assoc($resultHmgt)['count'];
    // Query data from Table 5
    $queryTmgt = "SELECT COUNT(*) as count FROM transport_management";
    $resultTmgt = mysqli_query($con, $queryTmgt);
    $countTmgt = mysqli_fetch_assoc($resultTmgt)['count'];
    // Collect data in an associative array
    $tableCounts = array(
        'Admin' => $countAdmin,
        'User' => $countUser,
        'Support' => $countSupport,
        'Hotel Management' => $countHmgt,
        'Transport Management' => $countTmgt
    );

    include("Navi_bar_admin.php");
    ?>

    <h2>User Type Statistics</h2>
    <!-- Adjust width and height here -->
    <canvas id="pieChart" width="100px" height="50px"></canvas>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var tableCounts = <?php echo json_encode($tableCounts); ?>;
        
        var chartData = {
            labels: Object.keys(tableCounts),
            datasets: [{
                data: Object.values(tableCounts),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(153, 102, 255, 0.5)'
                ],
                borderWidth: 1
            }]
        };
        
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: chartData,
            options: {
                tooltips: {
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var dataset = data.datasets[tooltipItem.datasetIndex];
                            var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                                return previousValue + currentValue;
                            });
                            var currentValue = dataset.data[tooltipItem.index];
                            var percentage = ((currentValue / total) * 100).toFixed(2);
                            return percentage + '%';
                        }
                    }
                }
            }
        });
    </script>
    <?php
    // Close the database connection
    mysqli_close($con);
    ?>
</body>
</html>
