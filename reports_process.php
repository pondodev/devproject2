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

        $query = "SELECT product_code, name, quantity_on_hand, price FROM products";
        $result = $conn->query($query);
        
            echo "<table>";
            echo "    <tr>";
            echo "        <th>Product Code</th>";
            echo "        <th>Name</th>";
            echo "        <th>Quantity on Hand</th>";
            echo "        <th>Sales in Last Week</th>";
            echo "        <th>Profit</th>";
			echo "        <th>Running Low?</th>";
            echo "    </tr>";

            while ($row = $result->fetch_assoc())
                PrintRow($row);
            
            echo "</table>";

			$conn->close();
    }

    function PrintRow($row)
    {
		include "dbconnect.php"; // used so that we can connect to the db
		$conn2 = new mysqli($server, $username, $password, $schema);
        if ($conn2->connect_error)
        {
            echo "error connecting to the db";
        }

		$pCode = $row["product_code"];
		$query2 = "SELECT * FROM transactions WHERE product_code = '$pCode' AND quantity < 0 AND date BETWEEN CURDATE()-INTERVAL 1 WEEK AND CURDATE()";
        $result2 = $conn2->query($query2);

		$sales = 0;
		while ($row2 = $result2->fetch_assoc())
		{
			$sales -= $row2["quantity"];
		}

		$profits = $sales * $row["price"];

		$runLow = "No";
		if ($row["quantity_on_hand"] < $sales)
		{
			$days = round(7 * ($row["quantity_on_hand"] / $sales));
			$runLow = "Yes, stock is predicted to run out in $days days.";
		}

        echo "<tr>";
        echo "    <td>".$row["product_code"]."</td>";
        echo "    <td>".$row["name"]."</td>";
        echo "    <td>".$row["quantity_on_hand"]."</td>";
		echo "    <td>".$sales."</td>";
		echo "    <td>"."$".$profits."</td>";
		echo "    <td>".$runLow."</td>";
        echo "</tr>";

		$conn2->close();
    }
?>