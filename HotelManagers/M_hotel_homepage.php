<?php

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hotel Management's Homepage</title>
    <link rel="stylesheet" href="M_navibar.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_hotel_homepage.php">HOME</a></li>
            <li><a href="M_view_hotel_info.php">HOTELS INFO</a></li>
            <li><a href="M_view_hotel_booking.php">HOTEL BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</head>

<body>
 <div class="backgroun-image">
            <header>
                <h1>Welcome Back to the Transport Management Page!</h1>
        
                <p>What do you want to do today?</p>
            </header>
            <section class="section transport-database">
                <div class="function" >
                    <img src="/picture/transport-database.png" alt="transport" class="transport">
                    <div class="function-text" id="transport-database">
                        <h2 class="transport-database">Transport Database</h2>
                        <p class="transport-database">View all the existing transport in the database.<br> You can edit and update transport details here too.  </p>
                            <button class="button">View Transport Database</button>       
                    </div>
                </div>
            </section>
            <section class="section manage-transport-booking">
                <div class="function" id="manage-transport-booking">
                    <img src="/picture/transport-booking.png" style="float: right;" class="generate-report">
                    <h2>Manage Transport Bookings</h2>
                    <p class="manage-booking">View, manage, confirm all of the transport related bookings here.</p>
                    <button class="button">Manage Transport</button>
                </div>
            </section>
         
            

            
        </div>
</body>
</html>
