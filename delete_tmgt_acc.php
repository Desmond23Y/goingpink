<?php

include("conn.php");

$id=intval($_GET['transport_manager_id']);

$result=mysqli_query($con,"DELETE FROM transport_management WHERE transport_manager_id=$id");

mysqli_close($con);
header('Location: view_tmgt_acc.php');

?>