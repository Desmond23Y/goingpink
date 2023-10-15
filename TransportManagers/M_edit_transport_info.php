<?php
session_start();
include('conn.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['transport_id'])) {
    $transport_id = $_GET['transport_id'];
    $result = mysqli_query($con, "SELECT * FROM transport_information WHERE transport_id = '$transport_id'");

    while ($row = mysqli_fetch_array($result)) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $transport_id = $row['transport_id'];
            $transport_type = $_POST['transport_type'];
            $transport_price_perKM = $_POST['transport_price_perKM'];

            if (!is_numeric($transport_price_perKM)) {
                echo "Error: Transport price must be a valid decimal number.";
            } else {
                $update_sql = "UPDATE transport_information SET
                    transport_type = ?,
                    transport_price_perKM = ?
                    WHERE transport_id = ?";

                $update_stmt = mysqli_prepare($con, $update_sql);
                mysqli_stmt_bind_param($update_stmt, "sis", $transport_type, $transport_price_perKM, $transport_id);

                if (mysqli_stmt_execute($update_stmt)) {
                    echo "<script>alert('Transport information has been updated!');</script>";
                } else {
                    echo "Error updating transport information: " . mysqli_error($con);
                }
            }
        }
        ?>
        <html>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Transport Information</title>
            <link rel="stylesheet" href="M_transport_homepage.css">
             <nav>
                <ul class="navibar">
                    <li><a href="M_transport_homepage.php">HOME</a></li>
                    <li><a href="M_view_transport_info.php">BACK</a></li>
          
        
                    <li><a href="../logout.php" class="right">LOGOUT</a></li>
                </ul>
            </nav>
        </head>

        <body>
            <header>
                <h1>Edit Transport Information</h1>
            </header>
            <div class="box">
                <form action="M_edit_transport_info.php?transport_id=<?php echo $transport_id; ?>" method="POST">
                    <label for="transport_type">Transport Type: </label>
                    <input type="text" id="transport_type" name="transport_type" required value="<?php echo $row['transport_type']; ?>">
                    <br><br>
                    <label for="transport_price_perKM">Transport  Price Per KM </label>
                    <input type="text" id="transport_price_perKM" name="transport_price_perKM" required value="<?php echo $row['transport_price_perKM']; ?>">
                    <br><br>
                    <input type="submit" name="submit" value="Save Changes">
                </form>
            </div>
        <?php
        }
        mysqli_close($con);
    } else {
        echo "Transport ID not provided.";
    }
?>
</body>
</html>
