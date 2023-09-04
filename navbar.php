<?php

?>
<!-- Start of HTML code -->
<html>
<head>
<style>

/*Style the top navigation bar */
.navbar {
  overflow: hidden;
  background-color: #950070;
}

.navbar a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 20px 20px 20px 20px;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
}

/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #FFFFFF;
  color: black;
}

.navbar a img {
  width: 25px;
  height: 25px;
  margin-right: 5px;
  float: left;
}


</style>
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
              <a href="homepage.php">Home <img src="picture/iHome.png"></a>
              <a href="View Booking.php">Booking<img src="picture/iBooking.png"></a>
              <a href="api_exRates.php">Currency<img src="picture/iExchange.png"></a>
              <a href="Ticket">Support<img src="picture/iSupport.png"></a>
              <a href="login.php">Home </a>
              <a href="editprofile.php" class="right">Profile<img src="picture/iProfile.png"></a>
              </div>
            </div>
        </nav>
    </header>
</body>
</html>
<!-- End of HTML code -->
