<?php

include("conn.php");

$id=intval($_GET['hotel_manager_id']);

$result=mysqli_query($con,"DELETE FROM hotel_management WHERE hotel_manager_id=$id");

mysqli_close($con);
header('Location: view_hmgt_acc.php');

?>