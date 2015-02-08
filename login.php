<?php session_start(); // Start session
    
        // Check to see if logout key:value pair exists
        // If so, destroy session and redirect
        if(isset($_GET['logout']) && $_GET['logout'] == 'true')
        {
            $_SESSION = array();
            session_destroy();
            $filepath = explode('/', $_SERVER['PHP_SELF'], -1);
            $filepath = implode('/', $filepath);
            $redirect = "http://".$_SERVER['HTTP_HOST'].$filepath;
            header("Location: {$redirect}/login.php", true);
            die();
        }
    ?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
    <form action="content1.php" method="POST">
    <label>Name: <input type="text" name="username"></label>
    <input type="submit" name="Login">    
    </form>


</body>
</html>