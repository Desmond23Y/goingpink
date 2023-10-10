<!DOCTYPE html>
<html>
<style>
body {
    padding: 0;
    margin: 0;
    font-family: 'Butler';
    }

ul {
    list-style: none;
    background-color: #F9B9C3;
    }

ul li {
    display: inline-block;
    position: relative;
    }

ul li a {
    display: block;
    padding: 20px 25px;
    color: #333;
    text-decoration: none;
    text-align: center;
    font-size: 15px;
    }

ul li a.dropdown {
    display: block;
    padding: 20px 25px;
    color: #333;
    text-decoration: none;
    text-align: center;
    font-size: 15px;
    }

ul li ul.dropdown-content li {
    display: block;
    }

ul li ul.dropdown-content {
    width: 100%;
    background-color: #F9B9C3;
    position: absolute;
    z-index: 999;
    display: none;
    }

ul li a:hover {
    background-color: #C7949C;
    color: white;
    }

ul li:hover ul.dropdown-content {
    display: block;
}
</style>

<body>
    <nav>
        <ul class="navibar">
            <li><a href="homepage_admin.php">HOME</a></li>
            <li>
                <a class="dropdown">MANAGE</a>
                <ul class="dropdown-content">
                    <a href="view_user_acc.php">USER</a>
                    <a href="view_hmgt_acc.php">HOTEL</a>
                    <a href="view_tmgt_acc.php">TRANSPORT</a>
                    <a href="view_support_acc.php">SUPPORT</a>
                    <a href="view_admin_acc.php">ADMIN</a>
                </ul>
            </li>
            <li><a href="generatereport.php">GENERATE REPORT</a></li>
            <li><a href="view_hotel_booking.php">MANAGE HOTEL BOOKING</a></li>
            <li><a href="view_transport_booking.php">MANAGE TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</body>
</html>
