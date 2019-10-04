<?php
    if (isset($_POST["username"]) && isset($_POST["password"]))
        Process($_POST["username"], $_POST["password"]);

    function Process($uname, $pwd)
    {
        // check if the user has entered a username and password
        if ($uname == "" && $pwd == "")
        {
            echo "please enter a username and password";
            return;
        }
        elseif ($uname == "")
        {
            echo "please enter a username";
            return;
        }
        elseif ($pwd == "")
        {
            echo "please enter a password";
            return;
        }

        // we can now verify that they are a member on the system
        include "dbconnect.php"; // used so that we can connect to the db
        $conn = new mysqli($server, $username, $password, $schema);

        if ($conn->connect_error)
        {
            echo "error connecting to the db";
        }

        $query = "SELECT * FROM users WHERE user_name = '$uname' AND user_password = '$pwd'";
        if ($conn->query($query)->num_rows == 1) // we have a valid user
            header("Location:main_menu.php");
        else // user has not been found
            echo "<p>please enter a valid username and password</p>";
    }
?>    