
<?php
    if (isset($_GET["id"]))
        GETProcess($_GET["id"]);
    elseif (isset($_POST["id"], $_POST["product_code"], $_POST["name"], $_POST["quantity_on_hand"], $_POST["price"])) // we POST when we actually make the edit
        POSTProcess($_POST["id"], $_POST["product_code"], $_POST["name"], $_POST["quantity_on_hand"], $_POST["price"]);
    else
        GoBack();

    function GETProcess($id)
    {
        $query = "SELECT * FROM products WHERE id=$id";
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

        // check if the record exists
        if ($conn->query($query)->num_rows != 1)
            GoBack();
    }

    POSTProcess($id, $product_code, $name, $quantity_on_hand, $price)
    {
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }
    }

    function GoBack()
    {
        header("Location:edit_product.php");
    }
?>    