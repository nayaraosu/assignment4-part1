<?php session_start();
    
        if(isset($_GET['logout']) && $_GET['logout'] == 'true')
        {
            $_SESSION = array();
            session_destroy();
            $filepath = explode('/', $_SERVER['PHP_SELF'], -1);
            $filepath = implode('/', $filepath);
            //echo $filepath;
            $redirect = "http://".$_SERVER['HTTP_HOST'].$filepath;
            //echo $redirect;
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