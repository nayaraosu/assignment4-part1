<?php
    session_start(); // Start session

    // If session is active, test for username
    if(session_status() == PHP_SESSION_ACTIVE)
    {

        if(isset($_POST['username']) && trim($_POST['username']) != "")
        {
            {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['logged_in'] = true; // If this key exists, other pages can use it to test for login state
                $valid_login = true;
             }

        }
        // If username is a blank space, warn
        elseif (trim($_POST['username']) != "")
        {
            $login_str = '<a href="login.php?logout=true">Click here to return to the login screen.</a>';
            echo "A username must be entered. ".$login_str;
            $valid_login = false;

        }
        elseif(isset($_SESSION['username']))
        {
            $valid_login = true;
        }
        // If the session is inactive, redirect back to login page
        else
        {
            $filepath = explode('/', $_SERVER['PHP_SELF'], -1);
            $filepath = implode('/', $filepath);
            $redirect = "http://".$_SERVER['HTTP_HOST'].$filepath;
            header("Location: {$redirect}/login.php", true);
            die();
        }
        // Set number of visits
        if (!isset($_SESSION['visits'])) 
        {
            $_SESSION['visits'] = 0;
        }
        //If the login is valid, increment # of visits and display username, visits, and links
        if($valid_login == true)
        {
            $_SESSION['visits']++;
            $visits = $_SESSION['visits'];
            $username = $_SESSION['username'];
            $logout_str = '<a href="login.php?logout=true">Click here to logout</a>';
            echo "Hello $username you have visited this page $visits times before. ".$logout_str;
            echo "<br><br>";
            $content2 = '<a href="content2.php">Click here to visit content2.php</a>';
            echo $content2;
        }

    }
?>