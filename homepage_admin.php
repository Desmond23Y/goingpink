<?php
session_start()
?>
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
            <li><a href="logout.php" class="right">LOGOUT</a></li>
            <li><a href="login.php" class="right">LOGIN</a></li>
        </ul>
    </nav>
</body>
</html>
