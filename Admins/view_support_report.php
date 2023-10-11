<?php
session_start();
include("conn.php");

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$result=mysqli_query($con,"SELECT* FROM report");

include("Navi_generate_report.php");
?>

<head>
    <link rel="stylesheet" href="viewhmgtacc.css">
</head>

<table width="90%">
    <tr bgcolor="#FFB6C1">
        <th>Report ID</th>
        <th>Support ID</th>
        <th>Report Title</th>
        <th>Priority</th>
        <th>Report Description</th>
        <th>Report Status</th>
        <th>Report Comment</th>
        <th>Edit</th>

    </tr>

<?php
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
        echo'<td><a href="update_report.php?report_id='.$row["report_id"].'">Edit</a></td>';
        echo'</tr>';
    }
    mysqli_close($con);
?>
</table>
