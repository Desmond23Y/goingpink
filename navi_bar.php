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

.navibar .dropdown {
    float: left;
    overflow: hidden;
}

.navibar .dropdown-content {
    display: none;
    position: absolute;
    background-color: #F9B9C3;
    min-width: 160px;
    z-index: 1;
}

.navibar .dropdown:hover .dropdown-content {
    display: block;
}

</style>

<body>
        <nav>
            <ul class="navibar">
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../Users/view_profile.php">PROFILE</a></li>
                <li><a href="../Users/faq.php">FAQ</a></li>

                <li class="dropdown">
                    <a href="#" class="dropbtn">FEATURES</a>
                    <div class="dropdown-content">
                        <a href="#">Feature 1</a>
                        <a href="#">Feature 2</a>
                        <a href="#">Feature 3</a>
                    </div>
                </li>

                
                
                <li><a href="../logout.php" class="right">LOGOUT</a></li>
                <li><a href="../register.php" class="right">REGISTER</a></li>            
                <li><a href="../login.php" class="right">LOGIN</a></li>
            </ul>
        </nav>
</body>
</html>
