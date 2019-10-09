<?php
    if (isset($_POST["prodname"]))
        Process($_POST["prodname"]);
    if (isset($_GET["status"]))
        echo "<p>successfully updated item</p>";

    function Process($prodname)
    {
        if ($prodname == "") // list everything in the table
            $query = "SELECT product_id, product_code, name, quantity_on_hand, price FROM products";
        else
            $query = "SELECT product_id, product_code, name, quantity_on_hand, price FROM products WHERE name LIKE '%$prodname%'";

        // we can now verify that they are a member on the system
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

        $result = $conn->query($query);
        if ($result->num_rows == 0) // no results
        {
            echo "<p>No results found :(</p>";
        }
        else // display results found
        {
            echo "<table>";
            echo "    <tr>";
            echo "        <th>Product Code</th>";
            echo "        <th>Name</th>";
            echo "        <th>Quantity on Hand</th>";
            echo "        <th>Price</th>";
            echo "    </tr>";

            while ($row = $result->fetch_assoc())
                PrintRow($row);

            echo "</table>";
        }
    }

    function PrintRow($row)
    {
        echo "<tr>";
        echo "    <td>".$row["product_code"]."</td>";
        echo "    <td>".$row["name"]."</td>";
        echo "    <td>".$row["quantity_on_hand"]."</td>";
        echo "    <td>".$row["price"]."</td>";
        // TODO: create product_editor.php
        echo "    <td><a href='product_editor.php?id=".$row["product_id"]."'>edit</a></td>";
        echo "</tr>";
    }
?>    