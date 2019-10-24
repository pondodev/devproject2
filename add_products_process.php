<?php
    //error logging
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    if(isset($_POST["product_code"]) && isset($_POST["name"]) && isset($_POST["quantity_on_hand"]) && isset($_POST["price"]) && isset($_POST["comment"]))
        Process($_POST["product_code"],$_POST["name"],$_POST["quantity_on_hand"],$_POST["price"],$_POST["comment"]);

    function Process($product_code,$name,$quantity_on_hand,$price,$comment)
    {
        if($product_code == "" && $name == "" && $date_added == "" && $quantity_on_hand == "" && $price == "" && $comment == "")
        {
            echo "Please fill out the details";
            return;
        }
        elseif($product_code == "")
        {
            echo "Please enter a product code";
            return;
        }
        elseif($name == "")
        {
            echo "Please enter a name";
            return;
        }
        elseif($quantity_on_hand == "")
        {
            echo "Please enter a quantity";
            return;
        }
        elseif($price == "")
        {
            echo "Please enter a price";
            return;
        }

        
        include "dbconnect.php";
        $conn = new mysqli($server, $username, $password, $schema);

        if($conn->connect_error)
        {
            echo "error connecting to db";
        }

        $query = "INSERT INTO products (product_code,name,date_added,quantity_on_hand,price,comment) VALUES
        ('$product_code','$name',CURRENT_DATE,$quantity_on_hand,$price,'$comment')
        ";

        $conn->query($query);

		// Add product to the transactions database
		$query = "INSERT INTO transactions (product_code,quantity,date) VALUES
        ('$product_code',$quantity_on_hand,CURRENT_DATE)
        ";

        $conn->query($query);

        $conn->close();
    }
?>