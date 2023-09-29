<?php
session_start()
?>
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
</style>
<body>
    <nav>
        <ul class="navibar">
            <li><a href="view_support_report.php">VIEW SUPPORT REPORT</a></li>
            <li><a href="view_ticket.php">VIEW TICKET</a></li>
            <li><a href="view_invoice.php">VIEW INVOICE</a></li>
            <li><a href="view_admin_acc.php">VIEW ADMIN ACC</a></li>
            <li><a href="view_user_acc.php">VIEW USER ACC</a></li>
            <li><a href="view_support_acc.php">VIEW SUPPORT ACC</a></li>
            <li><a href="view_hmgt_acc.php">VIEW HMGT ACC</a></li>
            <li><a href="view_tmgt_acc.php">VIEW TMGT ACC</a></li>
            <li><a href="admin_view_hotel_booking.php">VIEW HOTEL BOOKING</a></li>
            <li><a href="admin_view_transport_booking.php">VIEW TRANSPORT BOOKING</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
            <li><a href="login.php" class="right">LOGIN</a></li>
        </ul>
    </nav>
</body>
</html>
