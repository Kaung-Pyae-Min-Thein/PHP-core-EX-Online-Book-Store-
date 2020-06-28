<?php
include("../authority/check.php");
include('../Process/connect-database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertion Books</title>
</head>

<body>
    <form action="insertion.php" method="post" enctype="multipart/form-data">

        <label>Book Title: </label>
        <input type="text" name="title">

        <label>Author: </label>
        <input type="text" name="author">

        <label>Summary: </label>
        <textarea name="summary" cols="30" rows="10"></textarea>

        <label>Price: </label>
        <input type = "text" name = "price">

       <select name = "category_id">
           <option value="0">Choose Category:</option>
           <?php
           $result = mysqli_query($conn,"select * from categories");
           $categories=mysqli_fetch_all($result,MYSQLI_ASSOC);
           
           ?>
           <?php foreach($categories as $category): ?>
           <option value="<?php echo htmlspecialchars($category['id']) ?>">
            <?php echo htmlspecialchars($category['name']) ?>
            </option>
           <?php endforeach;?>
       </select>

        <label>Cover Photo:</label>
        <input type="file" name="cover">

        <input type="submit" value="Add Book">

    </form>
</body>

</html>