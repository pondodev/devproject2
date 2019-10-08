<!DOCTYPE html>
<html>
<head>
    <title>Edit a Product</title>
</head>

<body>
    <h1>Edit a Product</h1>
    <form action="edit_product.php" method="post">
        <label for="prodname">Prodcut Name: </label>
        <input type="text" id="prodname" name="prodname" /><br />

        <input type="submit" value="Search" />
    </form>
    <?php include "product_editor_process.php" ?>
</body>
</html>