<?php
include('../Process/connect-database.php');
$id = mysqli_real_escape_string($conn,$_GET['id']);
$status = mysqli_real_escape_string($conn,$_GET['status']);


$sql="UPDATE orders SET status=$status WHERE id=$id";
mysqli_query($conn,$sql);

header('location: orders.php')
?>