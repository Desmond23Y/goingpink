<!DOCTYPE html>
<html>
<head>
    <title>User Type Charts</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    // Database connection
    include('conn.php');

     if(!mysqli_query($con,$sql)) {
        die('Error:' . mysqli_error($con));
     }
    // Query data from Table 1
    $queryTable1 = "SELECT user_id, COUNT(*) as count FROM user";
    $resultTable1 = mysqli_query($conn, $queryTable1);

    $dataTable1 = array();
    while ($row = mysqli_fetch_assoc($resultTable1)) {
        $dataTable1[$row['user_id']] = $row['count'];
    }

    // Query data from Table 2
    $queryTable2 = "SELECT user_id, COUNT(*) as count FROM admin";
    $resultTable2 = mysqli_query($conn, $queryTable2);

    $dataTable2 = array();
    while ($row = mysqli_fetch_assoc($resultTable2)) {
        $dataTable2[$row['user_id']] = $row['count'];
    }
    ?>

    <h2>Table 1 User Type Counts</h2>
    <canvas id="chartTable1" width="400" height="200"></canvas>

    <h2>Table 2 User Type Counts</h2>
    <canvas id="chartTable2" width="400" height="200"></canvas>

    <script>
        // Chart.js code for Table 1
        var ctxTable1 = document.getElementById('chartTable1').getContext('2d');
        var dataTable1 = <?php echo json_encode($dataTable1); ?>;
        var chartTable1 = new Chart(ctxTable1, {
            type: 'bar',
            data: {
                labels: Object.keys(dataTable1),
                datasets: [{
                    label: 'Table 1 User Type Counts',
                    data: Object.values(dataTable1),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Chart.js code for Table 2
        var ctxTable2 = document.getElementById('chartTable2').getContext('2d');
        var dataTable2 = <?php echo json_encode($dataTable2); ?>;
        var chartTable2 = new Chart(ctxTable2, {
            type: 'bar',
            data: {
                labels: Object.keys(dataTable2),
                datasets: [{
                    label: 'Table 2 User Type Counts',
                    data: Object.values(dataTable2),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
