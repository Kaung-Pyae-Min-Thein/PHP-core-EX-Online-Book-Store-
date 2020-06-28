
<?php
include("../authority/check.php");
include("../Process/connect-database.php");

$sql = "SELECT books.*, categories.name
 FROM books LEFT JOIN categories
 ON books.category_id = categories.id";
$resource_id = mysqli_query($conn, $sql);
$result = mysqli_fetch_all($resource_id, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title>
</head>

<body>
    <?php foreach ($result as $detail) : ?>

        <h3><?php echo $detail['title'] ?></h3>
        <img src="../cover photo/<?php echo $detail['cover'] ?>">

        <p><?php echo $detail['summary'] ?></p>

        <label>Category : <?php echo $detail['name'] ?></label>
        <i>Author : <?php echo $detail['author'] ?> </i>
        <b>$ : <?php echo $detail['price'] ?> </b>


        <a href="edit-item.php?id=<?php echo $detail['id'] ?>">edit</a>
        <a href="delete.php?id= <?php echo $detail['id'] ?>"> delete</a>


    <?php endforeach; ?>
    <a href="insert-book.php">Insert New Book</a>
    <a href="orders.php">Manage Orders</a>
    <a href="../authority/logout.php">Log Out</a>
</body>

</html>