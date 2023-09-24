<?php

include("conn.php");

$id=intval($_GET['support_id']);

$result=mysqli_query($con,"DELETE FROM support WHERE support_id=$id");

mysqli_close($con);
header('Location: view_support_acc.php');

?>