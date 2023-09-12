<?php

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Hotel Management Homepage</title>
    <link rel="stylesheet" href="homepage_hotel_styles.css">
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
    <nav>
        <ul class="navibar">
            <li><a href="homepage_hotel.php">HOME</a></li>
            <li><a href="viewhotel.php">BOOKING</a></li>
            <li><a href="api_exRates.php">EXCHANGE RATES</a></li>
            <li><a href="request_form.php">SUPPORT</a></li>
            <li><a href="view_rating.php">VIEW RATING</a></li>
            <li><a href="rating.php">LEAVE A RATING</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
            <li><a href="register.php" class="right">REGISTER</a></li>
            <li><a href="login.php" class="right">LOGIN</a></li>
            <li><a href="view_profile.php" class="right">PROFILE</a></li>
        </ul>
    </nav>
</head>

<body>
<h1> Hotel Management Homepage </h1>
</body>
</html>
