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
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../Users/viewhotel.php">HOTEL</a></li>
                <li><a href="../Users/viewtransport.php">TRANSPORT</a></li>
                <li><a href="../api_exRates.php">EXCHANGE RATES</a></li>
                <li><a href="../request_form.php">SUPPORT</a></li>
                <li><a href="../Users/view_rating.php">VIEW RATING</a></li>
                <li><a href="../Users/rating.php">LEAVE A RATING</a></li>
                <li><a href="../logout.php" class="right">LOGOUT</a></li>
                <li><a href="../register.php" class="right">REGISTER</a></li>
                <li><a href="../login.php" class="right">LOGIN</a></li>
                <li><a href="../Users/view_profile.php" class="right">PROFILE</a></li>
                <li><a href="../Users/user_view_ticket.php" class="right">VIEW TICKETS</a></li>
                <li><a href="../Users/faq.php" class="right">FAQ</a></li>
            </ul>
        </nav>
</body>
</html>
