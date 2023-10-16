<?php
// make mysql query try and switch over on failure
$con = '';
try {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); 
    $con = mysqli_connect("localhost","id21215862_goingpink","@Goingpink123","id21215862_goingpink");
} catch (mysqli_sql_exception $e){
    $con = mysqli_connect("fdb1034.awardspace.net","4388183_goingpink","@Goingpink123","4388183_goingpink");
}
if ($con->connect_error) {
    die("Could not connect to the server!: " . $con->connect_error);
}
?>
