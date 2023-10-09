<!DOCTYPE html>
<html>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
}

.navibar {
    background-color: #333;
    overflow: hidden;
}

.navibar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.navibar li {
    float: left;
}

.navibar li a, .dropdown-content a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.navbar li a:hover, .dropdown:hover .dropbtn {
    background-color: #ddd;
    color: black;
}

.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a:hover {
    background-color: #ddd;
    color: black;
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>

<body>
    <nav>
        <ul class="navibar">
            <li><a href="homepage_admin.php">HOME</a></li>
            <li><a href="view_hotel_booking.php">BACK</a></li>
            <li><a href="../logout.php" class="right">LOGOUT</a></li>
        </ul>
    </nav>
</body>
</html>
