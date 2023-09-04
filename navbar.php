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
              <a href="homepage.php">Home</a>
              <a href="View Booking.php">Booking</a>
              <a href="api_exRates.php">Currency</a>
              <a href="Ticket.php">Support</a>
              <a href="login.php" class="right">Login</a>
              <a href="editprofile.php" class="right">Profile</a>
              </div>
            </div>
        </nav>
    </header>
</body>
</html>
<!-- End of HTML code -->
