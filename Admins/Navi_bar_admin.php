<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        font-size: 16px;
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
    
    .dropdown {
        float: left;
        overflow: hidden;
        position: static;
        }
    
    .dropdown .dropbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: #333;
        padding: 14px 16px;
        background-color: #F9B9C3;
        }
        
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #F9B9C3;
        min-width: 160px;
        }    
    
    .dropdown-content a {
        float: none;
        color: #333;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        text-align: center;
        }
    
    .dropdown:hover .dropdown-content {
        display: block;
        }
    </style>
</head>

<body>
    <div class="navibar">
        <a href="homepage_admin.php">HOME</a>
            <div class="dropdown">
                <button class="dropbtn">MANAGE ACCOUNT
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
</html>
