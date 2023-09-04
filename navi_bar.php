<?php
?>

<html>
<head>
<style>
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

.navbar a.right {
  float: right;
}

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
              <a href="index.php">Home</a>
              <a href="view_booking.php">Booking</a>
              <a href="api_exRates.php">Currency</a>
              <a href="request_form.php">Support</a>
              <a href="login.php" class="right">Login</a>
              <a href="register.php" class="right">Register</a>
              <a href="edit_profile.php" class="right">Profile</a>
              </div>
            </div>
        </nav>
    </header>
</body>
</html>
