<?php
session_start();
include('Process/connect-database.php');
$id=mysqli_real_escape_string($conn,$_GET['id']);

//session id <=> cart mr $id nk nout mr variable shi tl 
$_SESSION['cart'][$id]++;

header("location: index.php");

?>