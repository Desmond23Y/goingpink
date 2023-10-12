<!DOCTYPE html>
<html>
<style>
.navbar {
    overflow: hidden;
    background-color: #333;
    }

.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

.navbar a:hover {
    background-color: #ddd;
    color: black;
    }

.dropdown {
    float: left;
    overflow: hidden;
    }

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    }

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    z-index: 1;
    }

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    }

.dropdown:hover .dropdown-content {
    display: block; 
    }

</style>

<body>
    <div class="navibar">
        <a href="homepage_admin.php">HOME</a></li>
        <div class="dropdown">
            <button class="dropbtn">Manage
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="view_user_acc.php">USER</a>
                <a href="view_hmgt_acc.php">HOTEL</a>           
                <a href="view_tmgt_acc.php">TRANSPORT</a>
                <a href="view_support_acc.php">SUPPORT</a>
                <a href="view_admin_acc.php">ADMIN</a>
            </div>    
        </div>    
        <a href="generatereport.php">GENERATE REPORT</a>
        <a href="view_hotel_booking.php">MANAGE HOTEL BOOKING</a>
        <a href="view_transport_booking.php">MANAGE TRANSPORT BOOKING</a>
        <a href="../logout.php" class="right">LOGOUT</a>
    </div>
</body>
</html>
