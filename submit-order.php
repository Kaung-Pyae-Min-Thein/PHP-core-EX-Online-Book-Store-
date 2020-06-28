<?php
session_start();
include('Process/connect-database.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$sql = "INSERT INTO   orders ( name,email,phone,address,status,created_date,modified_date ) 
VALUES ('$name','$email','$phone','$address', 0 , now() ,now() )";
mysqli_query($conn, $sql);

//return auto generated id used in the last query
$order_id = mysqli_insert_id($conn);
//$id=book yk ID & order_id= Order tin tk ID
foreach ($_SESSION['cart'] as $id => $qty) {
    mysqli_query($conn, "INSERT INTO order_items
 ( book_id,order_id, qty) VALUES ($id,$order_id,$qty)
 ");
}
unset($_SESSION['cart']);

?>
<!doctype html>
<html>

<head>
    <title>Order Submitted</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Order Submitted</h1>

    <div class="msg">
        Your order has been submitted. We'll deliver the items soon.
        <a href="index.php" class="done">Book Store Home</a>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y") ?>. All right reserved.
    </div>
</body>

</html>