<?php
    // show any errors
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "dbconnect.php";
    $query = "CREATE TABLE IF NOT EXISTS `mydb`.`users` (
        user_name VARCHAR(30) NOT NULL,
        user_password VARCHAR(30) NOT NULL";
    $conn->query($query);
    $query = "CREATE TABLE IF NOT EXISTS `mydb`.`products` (
        `product_id` INT NOT NULL AUTO_INCREMENT,
        `product_code` CHAR(3) NOT NULL,
        `name` VARCHAR(100) NOT NULL,
        `date_added` DATE NOT NULL,
        `quantity_on_hand` INT(10) NOT NULL,
        `price` DECIMAL(7,2) NOT NULL,
        `comment` TEXT,
        PRIMARY KEY (`product_id`),
        UNIQUE INDEX `product_id_UNIQUE` (`product_id` ASC) VISIBLE)";
    
    $conn->query($query);
    $result = $conn->query($query);
    $conn->close();

    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // present the data.
    echo "<table><tr><th>product_code</th><th>name</th><th>name</th><th>Stock on hand</th><th>price</th></tr>";
    foreach ($rows as $row) {
        echo "<tr><td>" . $row['product_code'] . "</td><td>" .  $row['name'] . "</td><td>" .  $row['quantity_on_hand'] . "</td><td>" .  $row['price'] . "</td></tr>";
    }
    echo "</table>";
