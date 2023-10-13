<?php
session_start();

// Check if user is not logged in, then redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); 
    exit(); // Make sure to exit to prevent further execution of this script
}

    if (isset($_SESSION['user_id'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $support_id = $_SESSION['user_id'];
            include("conn.php");
        
            $sql = "INSERT INTO report (support_id, report_title, priority, report_description, report_status) VALUES ('$support_id', '$_POST[title]', '$_POST[priority]', '$_POST[description]', 'Created')";
                
        if(!mysqli_query($con, $sql)) {
            die('Error:' . mysqli_error($con));
        } else {
            echo "<script>alert('This form has been submitted!');</script>";
        }
        
        mysqli_close($con);
    }
}
?>
        
<!DOCTYPE html>
<head>
     <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="supportreport.css">
    
        <!-- Include Bootstrap-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
        <!--Import Butler & Futura Font-->
        <style>
        @import url('https://fonts.cdnfonts.com/css/butler');
        @import url('https://fonts.cdnfonts.com/css/futura-pt');

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
    
    <title>Report to Admin</title>
</head>

<body>    
    <nav>
    <ul class="navibar">
        <li><a href="homepage_support.php">HOME</a></li>
        <li><a href="support_report.php">REPORT</a></li>
        <li><a href="view_own_support_report.php">VIEW OWN REPORT</a></li>
        <li><a href="view_ticket.php">VIEW TICKET</a></li>
        <li><a href="../logout.php" class="right">LOGOUT</a></li>
    </ul>
    </nav>
    <header>
        <h1>Report Form</h1>
    </header>

    <form method="post">
    <label for="title">Title:</label>
    <input type="text" id="title" name="title" required="required"><br>

    <label for="priority">Report Priority:</label>
    <select name="priority" id="priority" required="required">
        <option value="">Please select the level of the priority</option>
        <option value="High">High</option>
        <option value="Medium">Medium</option>
        <option value="Low">Low</option>
    </select><br>

    <label for="description">Report Description:</label>
    <textarea id="description" name="description" rows="5" cols="50" required="required"></textarea><br>

    <button type="submit" value="Submit">Submit Form</button>
    </form><br>
</body>
</html>
