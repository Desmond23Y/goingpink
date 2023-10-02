<?php

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hotel Management's Homepage</title>
    <link rel="stylesheet" href="M_navibar.css">
     <!-- Include Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!--Import Butler & Futura Font-->
    <style>
    @import url('https://fonts.cdnfonts.com/css/butler');
    @import url('https://fonts.cdnfonts.com/css/futura-pt');
    </style>
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
            <div class="backgroun-image">
            <header>
                <h1>Welcome Back to the Hotel Management Page!</h1>
        
                <p>What do you want to do today?</p>
            </header>
            <section class="section hotel-database">
                <div class="function"id="hotel-database" >
                    <img src="/picture/manage-account.png" class="hotel-database">
                    <div class="function-text">
                        <h2 class="hotel-database">Hotel Database</h2>
                        <p class="hotel-database">View all the existing hotel in the database.<br> You can edit and update hotel details here too.  </p>
                            <button class="button">View Hotel Database</button>       
                    </div>
                </div>
            </section>
            <section class="section manage-hotel-booking">
                <div class="function" id="manage-booking">
                    <img src="/picture/generate-report.png" style="float: right;" class="generate-report">
                    <h2>Manage Hotel Bookings</h2>
                    <p class="manage-booking">View, manage, confirm all of the hotel related bookings here.</p>
                    <button class="button" id="manage-hotel-booking">Manage Bookings</button>
                </div>
            </section>
            

            
        </div>
</body>
</html>
