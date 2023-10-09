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
    font-size: 15px;
    }

.navibar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    }

.navibar li {
    float: left;
    }

.navibar li.right {
    float: right;
    }

.navibar li a, .dropdown-content a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

.navibar li a:hover, .dropdown:hover .dropbtn {
    background-color: #ddd;
    color: black;
    }

.dropdown {
    display: inline-block;
    }

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    z-index: 1;
    }      

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
    }

.dropdown:hover .dropdown-content {
    display: block;
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
