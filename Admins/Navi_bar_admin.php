<!DOCTYPE html>
<html>
<style>
.navibar {
    background-color: #333;
}

.navibar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

.navibar li {
    float: left;
}

.navibar a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navibar a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.dropdown li {
    display: block;
}

.dropdown a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown a:hover {
    background-color: #ddd;
}

.navibar li:hover .dropdown {
    display: block;
}

.dropdown {
    left: 0;
}
</style>

<body>
    <div class="navibar">
        <ul>
            <li><a href="homepage_admin.php">HOME</a></li>
                <li><a>MANAGE</a>
                    <div class="dropdown">
                        <ul>
                            <li><a href="view_user_acc.php">USER</a></li>
                            <li><a href="view_hmgt_acc.php">HOTEL</a></li>
                            <li><a href="view_tmgt_acc.php">TRANSPORT</a></li>
                            <li><a href="view_support_acc.php">SUPPORT</a></li>
                            <li><a href="view_admin_acc.php">ADMIN</a></li>
                        </ul>
                    </div>
                </li>
            <li><a href="generatereport.php">GENERATE REPORT</a></li>
            <li><a href="view_hotel_booking.php">MANAGE HOTEL BOOKING</a></li>
            <li><a href="view_transport_booking.php">MANAGE TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </div>
</body>
</html>
