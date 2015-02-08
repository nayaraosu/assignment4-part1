<?php
    session_start(); // Start session

    // Check for active session and 'logged_in' key
    if(session_status() == PHP_SESSION_ACTIVE)
    {
        // If logged_in exists and is true, output name and visit counter
        if (isset($_SESSION['logged_in']))
        {   
            if($_SESSION['logged_in'] == true)
            {  
                $visits = $_SESSION['visits'];
                $username = $_SESSION['username'];
                echo "You are logged in as $username and you have visited $visits times. ";
                $content1 = '<a href="content1.php">Click here to visit content1.php</a>';
                echo $content1;

            }
        }
        // If not logged in, redirect back to login page
        else
        {
            $filepath = explode('/', $_SERVER['PHP_SELF'], -1);
            $filepath = implode('/', $filepath);
            $redirect = "http://".$_SERVER['HTTP_HOST'].$filepath;
            header("Location: {$redirect}/login.php", true);
            die();

        }
    }
?>