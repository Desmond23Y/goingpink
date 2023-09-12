<?php
include('navi_bar.php');
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoingPink | Better Travel Site</title>
    <link rel="stylesheet" href="index_styles.css">
</head>
<body>
    <nav>
        <ul class="navibar">
            <li><a href="index.php">HOME</a></li>
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
    <section class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service">
                <img src="picture/Hotel.png" alt="Hotel">
                <h3>Hotel Bookings</h3>
                <p>Book your hotel now</p>
            </div>
            <div class="service">
                <img src="picture/Transport.png" alt="Transportation">
                <h3>Transport Bookings</h3>
                <p>Book transport now.</p>
            </div>
            <div class="service">
                <img src="picture/Rates.png" alt="Exchangerate">
                <h3>Currency Exchange Rates</h3>
                <p>View exchange rates</p>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are dedicated to providing exceptional travel services since 2023.</p>
        </div>
    </section>

</body>
</html>

