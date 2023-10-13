<?php
session_start();
include("conn.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
if (isset($_SESSION['user_id'])) {
    $support_id = $_SESSION['user_id'];
    $result = mysqli_query($con, "SELECT * FROM report WHERE support_id='$support_id'");
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>View Own Support Report</title>
    <link rel="stylesheet" href="homepage_support.css">
    <style>
        
        table {
            justify-content: center;
            align-items: center;
            border-collapse: collapse;
            margin-top: 20px auto;
        }

        th, td {
            border: 1px solid #E9204F;
            padding: 8px;
            text-align: left;
        }

        td{
            font-family:Futura,sans-serif;
        }

        tr:nth-child(even) {
            background-color: #FFE6E6;
        }

        tr:nth-child(odd) {
            background-color: #FFF3F3; 
        }

        th {
            background-color: #E9204F;
            color: white;
        }
        
    </style>
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

    <table>
        <tr>
            <th>Report ID</th>
            <th>Support ID</th>
            <th>Report Title</th>
            <th>Priority</th>
            <th>Report Description</th>
            <th>Report Status</th>
            <th>Report Comment</th>
        </tr>

    <?php
    if ($result !== null) {
        while($row=mysqli_fetch_array($result))
        {
            echo'<tr>';
            echo'<td>'.$row["report_id"].'</td>';
            echo'<td>'.$row["support_id"].'</td>';
            echo'<td>'.$row["report_title"].'</td>';
            echo'<td>'.$row["priority"].'</td>';
            echo'<td>'.$row["report_description"].'</td>';
            echo'<td>'.$row["report_status"].'</td>';
            echo'<td>'.$row["report_comment"].'</td>';
            echo'</tr>';
        }
        mysqli_close($con);
    } else {
        echo "No records found.";
    }
    ?>
    </table>
</body>
</html>
  



