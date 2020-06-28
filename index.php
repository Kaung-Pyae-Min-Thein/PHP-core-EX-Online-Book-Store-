<?php
session_start();
include("Process/connect-database.php");


$qty=0;
if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $Q){
        $qty += $Q;
    }
}





if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $sql = "select * from books where category_id=$category_id ";
} else {
    $sql = "select * from books";
}
$result = mysqli_query($conn, $sql);
$details = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>
    <a href="authority/login.php">Login</a>
    <a href="view-cart.php">( <?php echo $qty ?> ) books in your Cart.</a>

    

        <?php
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        $opts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        ?>
        <ul>
        <?php foreach ($opts as $opt) : ?>
            
           <li> 
               <a href="index.php?category_id=<?php echo $opt['id'] ?>">
                    <?php echo htmlspecialchars($opt['name']) ?>
            </a>
           </li>
            
        <?php endforeach; ?>
        </ul>
    

    <div>
        <?php foreach ($details as $detail) : ?>

            <img src="cover photo/<?php echo $detail['cover'] ?>">
            <h3><?php echo $detail['title'] ?></h3>


            <i>Author : <?php echo $detail['author'] ?> </i>

            <b>$ : <?php echo $detail['price'] ?> </b>
            <a href="detail.php?id=<?php echo $detail['id'] ?>">Detail:</a>
            <a href="add_to_cart.php?id=<?php echo $detail['id'] ?>">Add to Cart</a>

        <?php endforeach; ?>
    </div>
</body>

</html>