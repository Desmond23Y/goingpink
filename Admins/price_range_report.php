<!DOCTYPE html>
<html>
<head>
    <title>Hotel Price Report</title>
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
    $query = "SELECT hotel_price FROM hotel_information";
    $result = mysqli_query($con, $query);

    // Initialize an array to store price categories
    $priceCategories = array(
        'Under $200',
        '$200 - $499',
        '$500 - $799',
        'Over $800'
    );

    // Initialize an array to store the count of hotels in each price category
    $priceCounts = array(0, 0, 0, 0);

    while ($row = mysqli_fetch_assoc($result)) {
        $price = $row['hotel_price'];

        if ($price < 50) {
            $priceCounts[0]++;
        } elseif ($price >= 200 && $price < 500) {
            $priceCounts[1]++;
        } elseif ($price >= 500 && $price < 800) {
            $priceCounts[2]++;
        } else {
            $priceCounts[3]++;
        }
    }

    // Close the database connection
    mysqli_close($con);
    ?>

    <h2>Hotel Price Statistics</h2>
    <canvas id="pieChart" width="400" height="200"></canvas>

    <script>
        var ctx = document.getElementById('pieChart').getContext('2d');
        var chartData = {
            labels: <?php echo json_encode($priceCategories); ?>,
            datasets: [{
                data: <?php echo json_encode($priceCounts); ?>,
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
