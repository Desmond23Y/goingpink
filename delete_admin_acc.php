<?php

include("conn.php");

$id=intval($_GET['admin_id']);

$result=mysqli_query($con,"DELETE FROM admin WHERE admin_id=$id");

mysqli_close($con);
header('Location: view_admin_acc.php');

?>