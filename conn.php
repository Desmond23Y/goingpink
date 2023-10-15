<?php
$con = mysqli_connect("localhost","id21215862_goingpink","@Goingpink123","id21215862_goingpink");

if ($con->connect_error) {
    $con = mysqli_connect("fdb1034.awardspace.net","4388183_goingpink","@Goingpink123","4388183_goingpink");
    if ($con->connect_error) {
        die("Could not connect to the server!: " . $con->connect_error);
    }
}
?>
