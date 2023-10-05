<?php
session_start();
include("conn.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
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

    <table width="90%">
        <tr bgcolor="#E9204F">
            <td>Report ID</td>
            <td>Support ID</td>
            <td>Report Title</td>
            <td>Priority</td>
            <td>Report Description</td>
            <td>Report Status</td>
            <td>Report Comment</td>
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




