<!DOCTYPE html>
<html>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    }   

nav {
    background-color: #333;
    }

.navibar {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    }

.navibar li {
    float: left;
    }

.navibar li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

.navibar li a:hover, .dropdown:hover .dropbtn {
    background-color: #555;
    }

.dropdown {
    display: inline-block;
    }

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
    }

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    display: block;
    text-decoration: none;
    text-align: left;
    }

.dropdown-content a:hover {
    background-color: #ddd;
    }

.dropdown:hover .dropdown-content {
    display: block;
    }

.right {
    float: right;
    }
</style>

<body>
    <nav>
        <ul class="navibar">
            <li><a href="homepage_admin.php">HOME</a></li>
            <li class="dropdown">
                <a class="dropbtn">MANAGE</a>
                <div class="dropdown-content">
                    <a href="view_user_acc.php">USER</a>
                    <a href="view_hmgt_acc.php">HOTEL</a>
                    <a href="view_tmgt_acc.php">TRANSPORT</a>
                    <a href="view_support_acc.php">SUPPORT</a>
                    <a href="view_admin_acc.php">ADMIN</a>
                </div>
            </li>
            <li><a href="generatereport.php">GENERATE REPORT</a></li>
            <li><a href="view_hotel_booking.php">MANAGE HOTEL BOOKING</a></li>
            <li><a href="view_transport_booking.php">MANAGE TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</body>
</html>
