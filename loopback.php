<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
   <?php 
    
        if (count($_GET) == 0)
        {
            $json_array  = array("Type" => "GET", "parameters" => null );
            $json_obj = json_encode($json_array);
        }
        else
        {
            $tmp = array();
            foreach ($_GET as $key => $value) 
            {
                if($value == "")
                {
                    $tmp[$key] = null;
                }
                else
                {
                    $tmp[$key] = $value;
                }
            }
            $json_array  = array("Type" => "GET" , "parameters" => $tmp );
            $json_obj = json_encode($json_array);
        }
        echo $json_obj;
   ?> 

</body>
</html>