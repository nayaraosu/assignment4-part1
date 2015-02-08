<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
   <?php 
        // Method for creating JSON object with GET or PUT as parameter
        function buildJson($method)
        {
            // Flag for displaying error picture only once
            $jug_printed = false;

            // Set request type based on parameter
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
            
            // If there are no parameters, set JSON object key to null
            if (count($request) == 0)
            {
                $json_array  = array("Type" => $type, "parameters" => null );
                $json_obj = json_encode($json_array);
            }
            // Otherwise, add each parameters to a new array
            else
            {   
                $tmp = array();
                foreach ($request as $key => $value) 
                {
                    // If a value is empty, warn and set it to null
                    // Otherwise, add it to the array as a key/value pair
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
                // Build json object
                $json_array  = array("Type" => $type , "parameters" => $tmp );
                $json_obj = json_encode($json_array);
            }
            // Output JSON to browser
            echo $json_obj;
        };      
        
        // Call JSON function with GET or PUT as parameter
        buildJson($_SERVER['REQUEST_METHOD']);

   ?> 

</body>
</html>