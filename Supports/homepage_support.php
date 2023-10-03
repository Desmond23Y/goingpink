<?php
session_start()
?>
<!DOCTYPE html>
<html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GoingPink | Support</title>
        <link rel="stylesheet" href="support.css">
        <!-- Include Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!--Import Butler & Futura Font-->
        <style>
        @import url('https://fonts.cdnfonts.com/css/butler');
        @import url('https://fonts.cdnfonts.com/css/futura-pt');
        </style>
    
       <!--Javascript-->
       <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
    </head>

<body>
    <nav>
        <ul class="navibar">
            <li><a href="support_report.php">REPORT</a></li>
            <li><a href="view_own_support_report.php?user_id=<?php echo $_SESSION['user_id']; ?>">VIEW OWN REPORT</a></li>
            <li><a href="view_ticket.php">VIEW TICKET</a></li>
            <li><a href="logout.php" class="right">LOGOUT</a></li>
            <li><a href="login.php" class="right">LOGIN</a></li>
        </ul>
    </nav>
</body>
</html>
