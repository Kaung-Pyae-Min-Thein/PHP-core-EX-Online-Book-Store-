
<?php

include("../Process/connect-database.php");
$id = mysqli_real_escape_string($conn,$_GET['id']);

$sql="delete from books where id='$id' ";
mysqli_query($conn,$sql);

header('location: adminform.php');

?>