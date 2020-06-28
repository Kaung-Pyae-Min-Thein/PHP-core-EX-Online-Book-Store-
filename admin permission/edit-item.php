<?php
include("../authority/check.php");
include("../Process/connect-database.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = " SELECT * FROM books WHERE id = $id";

    $resource_id = mysqli_query($conn, $sql);
    $books = mysqli_fetch_assoc($resource_id);
} else
    echo "ID can't receive";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>

<body>
    <form action="edition.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $books['id'] ?>">

        <label>Title: </label>

        <input type="text" name="title" value="<?php echo htmlspecialchars($books['title']) ?? '' ?>">

        <label>Author: </label>
        <input type="text" name="author" value="<?php echo htmlspecialchars($books['author']) ?>">

        <label>Summary: </label>
        <input type="text" name="summary" value="<?php echo htmlspecialchars($books['summary']) ?>">

        <label>Price: $</label>
        <input type="text" name="price" value="<?php echo htmlspecialchars($books['price']) ?>">

        <select name="category_id">
            <option value="0">Choose Category:</option>
            <?php
            $result = mysqli_query($conn, "select * from categories");
            $assoArray = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach ($assoArray as $asso) :
            ?>
                <option value="<?php echo htmlspecialchars($assoArray['id']) ?>" <?php if ($asso['id'] = $books['category_id'])
                                                                                        echo "selected" ?>>
                    <?php echo htmlspecialchars($asso['name']) ?>
                </option>
            <?php endforeach; ?>

        </select>

        <img src="../cover photo/<?php echo htmlspecialchars($books['cover']) ?>" alt="">

        <label>Change Cover</label>
        <input type="file" name="cover">

        <input type="submit" value="Update">

    </form>
</body>

</html>