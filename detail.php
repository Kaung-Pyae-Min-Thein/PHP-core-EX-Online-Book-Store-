<?php

include('Process/connect-database.php');


$id = mysqli_real_escape_string($conn, $_GET['id']);


$sql = "SELECT books.*, categories.name
 FROM books LEFT JOIN categories
 ON books.category_id = categories.id
 WHERE books.id = $id ";


$result = mysqli_query($conn, $sql);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
</head>

<body>
    <h3><?php echo $book['title'] ?></h3>
    <img src="cover photo/<?php echo $book['cover'] ?>">

    <p><?php echo $book['summary'] ?></p>

    <label>Category : <?php echo $book['name'] ?></label>
    <i>Author : <?php echo $book['author'] ?> </i>
    <b>$ : <?php echo $book['price'] ?> </b>

    <a href="add_to_cart.php?id=<?php echo $book['id'] ?>">Add to Cart</a>
    <a href="index.php">Back</a>
</body>

</html>