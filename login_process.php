<?php
    if (isset($_POST["username"]) && isset($_POST["password"]))
        Process($_POST["username"], $_POST["password"]);

    function Process($username, $password)
    {
        // check if the user has entered a username and password
        if ($username == "" && $password == "")
        {
            echo "please enter a username and password";
            return;
        }
        elseif ($username == "")
        {
            echo "please enter a username";
            return;
        }
        elseif ($password == "")
        {
            echo "please enter a password";
            return;
        }

        // we can now verify that they are a member on the system
        echo "username and password entered";
    }
?>