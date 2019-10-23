<?php
    include "dbconnect.php"; // used so that we can connect to the db
    $conn = new mysqli($server, $username, $password, $schema);

    if ($conn->connect_error)
    {
        echo "error connecting to the db";
    }

    if (file_exists("./reports/report.csv"))
    {
        unlink("./reports/report.csv");
        echo "file exists";
    }
    
    // this query will create the csv at /reports on the server
    // TODO: actually fix this. it's a server side issue with the perms to /home/devproj
    $query = "SELECT * INTO OUTFILE '/home/devproj/htdocs/reports/report.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM products";
    $conn->query($query);
    echo "finished query";

    //header("Location: /reports/report.csv");

    $conn->close();
?>