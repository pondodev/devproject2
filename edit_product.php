<!DOCTYPE html>
<html>
<head>
    <title>Edit a Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php include "header.php" ?>
    <h1>Edit a Product</h1>
    <form action="edit_product.php" method="post">
        <label for="prodname">Product Name: </label>
        <input type="text" id="prodname" name="prodname" /><br />

        <input type="submit" value="Search" />
    </form>
    <?php include "edit_product_process.php" ?>
</body>
</html>