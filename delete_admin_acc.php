<?php

include("conn.php");

$admin_id=$_GET['admin_id'];
echo "Admin ID: " . $admin_id;

$result=mysqli_query($con,"DELETE FROM admin WHERE admin_id=$admin_id");

mysqli_close($con);
header('Location: view_admin_acc.php');

?>
