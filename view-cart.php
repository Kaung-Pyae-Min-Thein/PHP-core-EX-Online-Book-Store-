<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header('location: index.php');
    exit();
}
include('Process/connect-database.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
</head>

<body>
    <a href="index.php">Continue Shopping</a>
    <a href="clear-cart.php">Clear Shopping</a>
    <table>
        <tr>
            <th>Book Title</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Price</th>
        </tr>


        <?php
        $total = 0;

        //display product in key and value pairs
        foreach ($_SESSION['cart'] as $id => $qty) :

            $sql = "SELECT * FROM books where id=$id";

            $result = mysqli_query($conn, $sql);
            $view_book = mysqli_fetch_assoc($result);

            $total += $view_book['price'] * $qty;
        ?>
            <!--display book data-->
            <tr>
                <td> <?php echo $view_book['title'] ?></td>
                <td><?php echo $qty ?></td>
                <td><?php echo $view_book['price'] ?></td>
                <td><?php echo $view_book['price'] * $qty ?></td>

            </tr>
        <?php endforeach; ?>

        <tr>
            <td>Total value:</td>
            <td><?php echo $total  ?></td>
        </tr>

        <h2>Order Now</h2>
        
        <form action="submit-order.php" method="post">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name">
            
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
            
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone">
            
            <label for="address">Address</label>
            <textarea name="address" id="address"></textarea>
            
            <br><br>
            
            <input type="submit" value="Submit Order">
            
            <a href="index.php">Continue Shopping</a>
        </form>

</body>

</html>