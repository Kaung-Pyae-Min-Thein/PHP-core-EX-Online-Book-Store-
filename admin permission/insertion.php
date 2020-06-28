<?php
include('../Process/connect-database.php');
if(!$conn){
    echo "Mysql Connection Error" . mysqli_connect_error();
}
else 
{
$title =mysqli_real_escape_string( $conn, $_POST['title'] );
$author = mysqli_real_escape_string($conn,$_POST['author']);
$summary = mysqli_real_escape_string($conn,$_POST['summary']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
$category_id = mysqli_real_escape_string($conn , $_POST['category_id'] );
$cover = $_FILES['cover']['name'];
$file_tmp = $_FILES['cover']['tmp_name'];

if( isset($cover) ) {
move_uploaded_file($file_tmp,"../cover photo/".$cover);
}
$sql= "INSERT INTO books (
 title, author, summary, price, category_id,
 cover, created_date, modified_date
 ) VALUES (
 '$title', '$author', '$summary', '$price',
 '$category_id', '$cover', now(), now()
 )";


mysqli_query( $conn , $sql );

header('location: adminform.php');
}

?>