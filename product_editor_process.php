<?php
    if (isset($_GET["id"]))
        GETProcess($_GET["id"]);
    elseif (isset($_POST["product_id"], $_POST["product_code"], $_POST["name"], $_POST["quantity_on_hand"], $_POST["price"])) // we POST when we actually make the edit
        POSTProcess($_POST["product_id"], $_POST["product_code"], $_POST["name"], $_POST["quantity_on_hand"], $_POST["price"]);
    else
        GoBack();

    function GETProcess($id)
    {
        $query = "SELECT * FROM products WHERE product_id=$id";
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

        $result = $conn->query($query);
        // check if the record exists
        if ($result->num_rows != 1)
        {
            GoBack();
            return;
        }

        $row = $result->fetch_assoc();
        ShowForm($row["product_id"], $row["product_code"], $row["name"], $row["quantity_on_hand"], $row["price"]);
    }

    function POSTProcess($id, $product_code, $name, $quantity_on_hand, $price)
    {
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

		// Track the edit in the transactions database
		// Calculate the difference in quantity
		$query = "SELECT quantity_on_hand FROM products WHERE product_code='$product_code'";
		$result = $conn->query($query);
		$quantity = $result->fetch_assoc();
		$difference = $quantity_on_hand - $quantity["quantity_on_hand"];

		// Add the new transaction record
		$query = "INSERT INTO transactions (product_code,quantity,date) VALUES
        ('$product_code',$difference,CURRENT_DATE)
        ";

        $conn->query($query);

        // now we add the data to the db
        $query = "UPDATE products SET ";
        $query .= "product_code='$product_code',";
        $query .= "name='$name',";
        $query .= "quantity_on_hand=$quantity_on_hand,";
        $query .= "price=$price ";
        $query .= "WHERE product_id=$id";

        $conn->query($query);

        header("Location:edit_product.php?status=success");
    }

    function GoBack()
    {
        header("Location:edit_product.php");
    }

    function ShowForm($id="", $product_code="", $name="", $quantity_on_hand="", $price="")
    {
        echo '<form action="product_editor.php" method="post">';
        echo '    <label for="product_id">Product ID: </label>';
        echo '    <input type="text" id="product_id" name="product_id" value="'.$id.'" readonly /><br />';
        echo '    <label for="product_code">Product Code: </label>';
        echo '    <input type="text" id="product_code" name="product_code" value="'.$product_code.'" /><br />';
        echo '    <label for="name">Product Name: </label>';
        echo '    <input type="text" id="name" name="name" value="'.$name.'" /><br />';
        echo '    <label for="quantity_on_hand">Quantity on Hand: </label>';
        echo '    <input type="text" id="quantity_on_hand" name="quantity_on_hand" value="'.$quantity_on_hand.'" /><br />';
        echo '    <label for="price">Price: </label>';
        echo '    <input type="text" id="price" name="price" value="'.$price.'" /><br />';
        echo '    <input type="submit" value="Save" />';
        echo '</form>';
    }
?>    