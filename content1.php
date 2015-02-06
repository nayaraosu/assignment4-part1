<?php
    session_start();
    
    if(session_status() == PHP_SESSION_ACTIVE)
    {

        if(isset($_POST['username']) && trim($_POST['username']) != "")
        {
            //if ($_POST['username'] != null || $_POST['username'] != "" )
            {
                $_SESSION['username'] = $_POST['username'];
                $_SESSION['logged_in'] = true;
                $valid_login = true;

                //$username = $_POST['username'];
            }

        }
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

        if (!isset($_SESSION['visits'])) 
        {
            $_SESSION['visits'] = 0;
        }
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