<?php
    //error logging
    ini_set('display_errors', 1);
    ini_set('display_startup_errors',1);
    error_reporting(E_ALL);
    include "dbconnect.php";
    if(isset($_POST["product_code"]) && isset($_POST["name"]) && isset($_POST["date_added"]) && isset($_POST["quantity_on_hand"]) && isset($_POST["price"]) && isset($_POST["comment"]))
        Process($_POST["product_code"],$_POST["name"],$_POST["date_added"],$_POST["quantity_on_hand"],$_POST["price"],$_POST["comment"]);

    function Process($product_code,$name,$date_added,$quantity_on_hand,$price,$comment)
    {
        
        $query = "INSERT INTO 'products' (product_code,name,date_added,quantity_on_hand,price,comment) VALUES
        ('$product_code','$name','$date_added','$date_added','$quantity_on_hand','$price','$comment')
        ";

        $conn->query($query);
        $result = $conn->query($query);
        $conn->close();
    }
?>