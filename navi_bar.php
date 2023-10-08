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
    font-family: Butler, serif;
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

.logo {
    display: inline-block;
    vertical-align: middle;
    width: 40px;
    height: auto; 
    margin-right: 10px; 
}



</style>

<body>
        <nav>
            <ul class="navibar">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../Users/view_profile.php">PROFILE</a></li>
                <li><a href="../Users/faq.php">FAQ</a></li>
                <li><a href="../Users/invoice.php">Check Booking History</a></li>

               

                
                
                <li><a href="../logout.php" class="right">LOGOUT</a></li>
                <li><a href="../register.php" class="right">REGISTER</a></li>            
                <li><a href="../login.php" class="right">LOGIN</a></li>
            </ul>
        </nav>
</body>
</html>
