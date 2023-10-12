<!DOCTYPE html>
<html>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

body {
    margin: 0;
    padding: 0;
    }

.navibar {
    overflow: hidden;
    background-color: #333;
    width: 100%;
    }

.navibar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    }

.navibar a:hover {
    background-color: #ddd;
    color: black;
    }

.navibar a.right {
    float: right;
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
    position: static;
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

<nav>
    <div class="navibar">
        <a href="homepage_admin.php">HOME</a></li>
        <div class="dropdown">
            <a class="dropbtn">MANAGE</a>
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
</nav>
</html>
