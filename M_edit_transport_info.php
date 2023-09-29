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
            $hotel_id = $row['hotel_id'];
            $hotel_name = $_POST['hotel_name'];
            $room_type = $_POST['room_type'];
            $room_availability = $_POST['room_availability'];
            $hotel_availability = $_POST['hotel_availability'];
            $hotel_price = $_POST['hotel_price'];

            $update_sql = "UPDATE hotel_information SET
                hotel_name = ?,
                room_type = ?,
                room_availability = ?,
                hotel_availability = ?,
                hotel_price = ?
                WHERE hotel_id = ?";

            $update_stmt = mysqli_prepare($con, $update_sql);
            mysqli_stmt_bind_param($update_stmt, "ssisis", $hotel_name, $room_type, $room_availability, $hotel_availability, $hotel_price, $hotel_id);

            if (mysqli_stmt_execute($update_stmt)) {
                echo "<script>alert('Hotel information has been updated!');</script>";
            } else {
                echo "Error updating hotel information: " . mysqli_error($con);
            }
?>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Edit Transport Information</title>
                <link rel="stylesheet" href="M_navibar.css">
                 <nav>
                    <ul class="navibar">
                        <li><a href="M_transport_homepage.php">HOME</a></li>
                        <li><a href="M_view_transport_info.php">TRANSPORTS INFO</a></li>
                        <li><a href="M_view_transport_booking.php">TRANSPORT BOOKING</a></li>
            
                        <li><a href="logout.php" class="right">LOGOUT</a></li>
                    </ul>
                </nav>
            </head>
              
            <body>
                <h1>Edit Transport Information</h1>
                <div class="box">
                    <form action="M_edit_transport_info.php?transport_id=<?php echo $transport_id; ?>" method="POST">
                        <label for="transport_id">Transport ID: </label>
                        <input name="transport_id" readonly="readonly" value="<?php echo $transport_id; ?>">
                        <br><br>
                        <label for="transport_type">Transport Type: </label>
                        <input type="text" id="transport_type" name="transport_type" required value="<?php echo $row['transport_type']; ?>">
                        <br><br>
                        <label for="room_type">Room Type: </label>
                        <input type="text" id="room_type" name="room_type" required value="<?php echo $row['room_type']; ?>">
                        <br><br>
                        <input type="submit" name="submit" value="Save Changes">
                    </form>
                </div>
            <?php
            }
            mysqli_close($con);
        } else {
            echo "Hotel ID not provided.";
        }
    ?>
</body>
</html>