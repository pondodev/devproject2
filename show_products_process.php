<?php
    Process();

    function Process()
    {
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);
        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

        $query = "SELECT * FROM products";
        $result = $conn->query($query);
        
            echo "<table>";
            echo "    <tr>";
            echo "        <th>Product ID</th>";
            echo "        <th>Product Code</th>";
            echo "        <th>Name</th>";
            echo "        <th>Date Added</th>";
            echo "        <th>Quantity on Hand</th>";
            echo "        <th>Price</th>";
            echo "        <th>Comment</th>";
            echo "    </tr>";

            while ($row = $result->fetch_assoc())
                PrintRow($row);
            
            echo "</table>";
    }

    function PrintRow($row)
    {
        echo "<tr>";
        echo "    <td>".$row["product_id"]."</td>";
        echo "    <td>".$row["product_code"]."</td>";
        echo "    <td>".$row["name"]."</td>";
        echo "    <td>".$row["date_added"]."</td>";
        echo "    <td>".$row["quantity_on_hand"]."</td>";
        echo "    <td>".$row["price"]."</td>";
        echo "    <td>".$row["comment"]."</td>";
        echo "</tr>";
    }
?>