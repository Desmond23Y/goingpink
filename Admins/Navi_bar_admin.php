<!DOCTYPE html>
<html>
<style>
* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    }

body {
    font-family: 'Butler'
    }

.navibar {
    text-align: center;
    color: #F9B9C3;
    }

.navibar ul {
    display: inline-flex;
    list-style: none;
    color: white;
    }

.navibar ul li {
    width: 120px;
    margin: 15px;
    padding: 15px;
    }

.navibar ul li a {
    text-decoration: none;
    color: white;
    }

.navibar ul li:hover {
    background-color: #C7949C;
    color: white;
    border-radius: 3px;
    }

.dropdown {
    display: none;
    }

.navibar ul li:hover .dropdown {
    display:block;
    position: absolute;
    background-color: #F9B9C3;
    margin-top: 15px;
    margin-left: 15px;
    }

.navibar ul li:hover .dropdown {
    display: block;
    margin: 10px;
    }

.navibar ul li:hover .dropdown ul li {
    width: 150px;
    padding: 10px;
    border-bottom: 1px solid #65313D;
    background: transparent;
    border-radius: 0;
    text-align: left;
    }

.navibar ul li:hover .dropdown ul li:last-child {
    border-bottom: none;
    }    

.navibar ul li:hover .dropdown ul li a:hover {
    background-color: #C7949C;
    color: white;
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
