<?php
session_start();
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Transport Management Homepage</title>
    <link rel="stylesheet" href="M_transport_homepage.css">
    <nav>
        <ul class="navibar">
            <li><a href="M_transport_homepage.php">HOME</a></li>
            <li><a href="M_view_transport_info.php">TRANSPORT INFORMATION</a></li>
            <li><a href="M_view_transport_booking.php">TRANSPORT BOOKING</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
     <!-- Include Bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
     <!--Import Butler & Futura Font-->
     <style>
      @import url('https://fonts.cdnfonts.com/css/butler');
      @import url('https://fonts.cdnfonts.com/css/futura-pt');
     </style>
    
     <!--Javascript-->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</head>

<body>
  <div class="backgroun-image">
            <header>
                <h1>Welcome Back to the Transport Management Page!</h1>
        
                <p>What do you want to do today?</p>
            </header>
              <section class="section transport-database">
                <div class="function" id="transport-database">
                    <img src="/picture/transport-database.png" alt="transport" class="transport-database">
                    <div class="function-text">
                        <h2 class="transport-database">Transport Database</h2>
                        <p class="transport-database">View all the existing transport in the database.<br> You can edit and update transport details here too.  </p>
                           <a href="M_view_transport_info.php" ><button class="button">View Transport Database</button></a>
    
                    </div>
                </div>
            </section>
            <section class="section manage-transport-booking">
                <div class="function" id="manage-transport-booking">
                    <img src="/picture/transport-booking.png" style="float: right;" class="generate-report">
                    <div class="function-text" >
                        <h2>Manage Transport Bookings</h2>
                        <p class="manage-booking">View, manage, confirm all of the transport related bookings here.</p>
                        <a href="M_view_transport_booking.php" ><button class="button">Manage Transport</button></a>
                    </div>
                </div>
            </section>
         
            

            
        </div>

</body>
</html>
