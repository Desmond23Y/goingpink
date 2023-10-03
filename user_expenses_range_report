<!DOCTYPE html>
<html>
<head>
    <title>User Expenses Range Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    // Database connection
    include('conn.php');

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Query data from the database table
    $query = "SELECT total_amount FROM invoice";
    $result = mysqli_query($con, $query);

    // Initialize an array to store expenses categories
    $expensesCategories = array(
        'Under $500',
        '$500 - $999',
        '$1000 - $1499',
        'Over $1500'
    );

    // Initialize an array to store the count of expenses in each category
    $priceCounts = array(0, 0, 0, 0);

    while ($row = mysqli_fetch_assoc($result)) {
        $price = $row['total_amount'];

        if ($expenses < 500) {
            $expensesCounts[0]++;
        } elseif ($expenses >= 500 && $expenses < 1000) {
            $expensesCounts[1]++;
        } elseif ($expenses >= 1000 && $expenses < 1500) {
            $expensesCounts[2]++;
        } else {
            $expensesCounts[3]++;
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <h2>User Expenses Statistics</h2>
    <canvas id="pieChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var chartData = {
            labels: <?php echo json_encode($expensesCategories); ?>,
            datasets: [{
                data: <?php echo json_encode($expensesCounts); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(54, 162, 235, 0.5)'
                ],
                borderWidth: 1
            }]
        };

        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: chartData
        });
    </script>
</body>
</html>
