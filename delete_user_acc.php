<?php

include("conn.php");

$id=intval($_GET['user_id']);

$result=mysqli_query($con,"DELETE FROM user WHERE user_id=$id");

mysqli_close($con);
header('Location: view_user_acc.php');

?>