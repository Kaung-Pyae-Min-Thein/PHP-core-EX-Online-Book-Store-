<?php
include("../authority/check.php");
include("../Process/connect-database.php");

$id = mysqli_real_escape_string($conn,$_POST['id']);
$title = mysqli_real_escape_string($conn,$_POST['title']);
$author = mysqli_real_escape_string($conn ,$_POST['author']);
$summary = mysqli_real_escape_string($conn,$_POST['summary']);
$price =  mysqli_real_escape_string($conn,$_POST['price']);

$category_id = mysqli_real_escape_string($conn,$_POST['category_id']);

$cover = mysqli_real_escape_string($conn,$_FILES['cover']['name']);
$file_tmp = mysqli_real_escape_string($conn,$_FILES['cover']['tmp_name']);



if (isset($cover)) {
    move_uploaded_file($file_tmp, "cover photo/" . $cover);
    $sql="UPDATE books SET title = '$title', author = '$author',summary = '$summary',price='$price',category_id = '$category_id',cover = '$cover'
            WHERE id = '$id'  " ;
} else {
    $sql= "UPDATE books SET title = '$title', author = '$author',summary = '$summary',price='$price',category_id = '$category_id' WHERE id = '$id' ";
}
mysqli_query($conn , $sql);

header('location: index.php');



?>