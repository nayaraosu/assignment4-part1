<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
   <?php 
    

        function buildJson($method)
        {
            $jug_printed = false;
            if($method == "GET")
            {
                $request = $_GET;
                $type = "GET";
            }
            elseif ($method == "POST")
            {
                $request = $_POST;
                $type = "POST";
            }
            
            if (count($request) == 0)
                {
                    $json_array  = array("Type" => $type, "parameters" => null );
                    $json_obj = json_encode($json_array);
                }
                else
                {
                    $tmp = array();
                    foreach ($request as $key => $value) 
                    {
                        if($value == "")
                        {
                            echo "<b>WARNING: </b>There is no associated value for $key. Please deal with the issue. For now, setting the value to NULL.<br>";
                            if($jug_printed == false)
                            {
                                echo '<img src="dealwithit.jpg" ><br>';
                                $jug_printed = true;
                            }
                            $tmp[$key] = null;
                        }
                        else
                        {
                            $tmp[$key] = $value;
                        }
                    }
                    $json_array  = array("Type" => $type , "parameters" => $tmp );
                    $json_obj = json_encode($json_array);
                }
                echo $json_obj;
        };      
        
        buildJson($_SERVER['REQUEST_METHOD']);

   ?> 

</body>
</html>