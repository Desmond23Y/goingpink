<!DOCTYPE html>
<html>
<style>
    body {
    margin: 0;
    padding: 0;
    }

.navibar {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #F9B9C3;
    font-family: Butler, serif;
    }

.navibar a {
    float: left;
    display: block;
    color: #333;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

.navibar a.right {
    float: right;
    }

.navibar a:hover {
    background-color: #C7949C;
    color: white;
    }

.logo {
    display: inline-block;
    vertical-align: middle;
    width: 40px;
    height: auto; 
    margin-right: 10px; 
    }
</style>

<body>
    <nav>
        <ul class="navibar">
            <li><a href="homepage_admin.php">HOME</a></li>
            <li><a href="view_user_acc.php">MANAGE USER</a></li>
            <li><a href="view_hmgt_acc.php">MANAGE HOTEL</a></li>
            <li><a href="view_tmgt_acc.php">MANAGE TRANSPORT</a></li>
            <li><a href="view_support_acc.php">MANAGE SUPPORT</a></li>
            <li><a href="view_admin_acc.php">MANAGE ADMIN</a></li>
            <li><a href="generatereport.php">GENERATE REPORT</a></li>
            <li><a href="view_hotel_booking.php">MANAGE HOTEL BOOKING</a></li>
            <li><a href="view_transport_booking.php">MANAGE TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</body>
</html>
