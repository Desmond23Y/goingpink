<?php
$con = mysqli_connect("localhost","id21215862_goingpink","@Goingpink123","id21215862_goingpink");

if ($con->connect_error) {
    $con = mysqli_connect("localhost","mseet_35232520","Goingpink123","mseet_35232520_1");
    if ($con->connect_error) {
        die("Could not connect to the server!: " . $con->connect_error);
    }
} 
?>
