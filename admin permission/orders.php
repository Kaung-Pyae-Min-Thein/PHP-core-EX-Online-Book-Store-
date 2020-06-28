<?php
include('../authority/check.php');
include('../Process/connect-database.php');
$order_sql = "SELECT * FROM orders";
$result = mysqli_query($conn, $order_sql);
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Form</title>
</head>

<body>
    <a href="adminform.php">Back</a>
    <?php
    //display clinet info
    foreach ($orders as $order) :  ?>
        <li><?php echo $order['name'] ?></li>
        <li><?php echo $order['email'] ?></li>
        <li><?php echo $order['phone'] ?></li>
        <li><?php echo $order['address'] ?></li>

        <!--/check delivered or didn't if[1] true [0] false-->
        <?php
        if ($order['status']) :
        ?>
            * <a href="order-status.php?id=<?php echo $order['id'] ?>& status=0">Undo</a>
        <?php else : ?>
            * <a href="order-status.php?id=<?php echo $order['id'] ?>& status=1">Mark as Delivered</a>
        <?php endif; ?>
    <?php endforeach; ?>
    <!--* item htoke tk ny yr hmr ny tl -->
    <?php
    //display order info
    $order_id = $order['id'];
    $item_sql = "SELECT order_items.*,books.title FROM order_items LEFT JOIN books ON order_items.book_id = books.id WHERE order_items.order_id=$order_id";
    $result = mysqli_query($conn, $item_sql);
    $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
    foreach ($items as $item) :
    ?>
        
        <a href="../detail.php?id = <?php echo $item['book_id'] ?>"><?php echo $item['title'] ?></a>
        (<?php echo $item['qty'] ?>)
    <?php endforeach; ?>

</body>

</html>