<?php
session_start();

$email = $_POST['email'];
$pw = $_POST['password'];


if($email == 'admin@gmail.com' && $pw == '12345') {
    $_SESSION['auth']=true;
    header('location: ../admin permission/adminform.php');
    }
else{
    header('location: ../index.php');
}


?>