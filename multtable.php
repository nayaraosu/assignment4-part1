<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
  <?php 

    // Flag to set whether parameters are good to use
    $valid_input = true;

    // Check to see if parameters exist. If not, warn user and set flag to false
    if (!isset($_GET['min-multiplicand']) || !isset($_GET['max-multiplicand']) || !isset($_GET['min-multiplier']) ||!isset($_GET['max-multiplier']) )
    {
      echo "<h1>You are missing one or more parameters. Please fix this.<h1>";
      $valid_input = false;
    }
    else
    {
      // Set parameters to variables
      $min_mcand = $_GET['min-multiplicand'];
      $max_mcand = $_GET['max-multiplicand'];
      $min_mplier = $_GET['min-multiplier'];
      $max_mplier = $_GET['max-multiplier'];

      // Check to see if parameters are numeric and do not contain decimal symbols
      if(!is_numeric($min_mcand) || strpos($min_mcand, ".") !== false)
      {
          echo "<h1>$min_mcand is not an integer</h1><br>";
          $valid_input = false;
      }
      if(!is_numeric($max_mcand) || strpos($max_mcand, ".") !== false)
      {
          echo "<h1>$max_mcand is not an integer</h1><br>";
          $valid_input = false;
      }

      if(!is_numeric($min_mplier) || strpos($min_mplier, ".") !== false)
      {
          echo "<h1>$min_mplier is not an integer</h1><br>";
          $valid_input = false;
      }

      if(!is_numeric($max_mplier ) || strpos($max_mplier, ".") !== false)
      {
          echo "<h1>$max_mplier is not an integer</h1><br>";
          $valid_input = false;
      }

      // Check to see if mins are less than maxes
      if ($min_mcand > $max_mcand) 
      {
        echo "<h1>Minimum multiplicand larger than maximum.</h1>";
        $valid_input = false;
      }

      if ($min_mplier > $max_mplier)
      {
        echo "<h1>Minimum multipler larger than maximum.</h1>";
        $valid_input = false;
      }
    
      // After all the parameters have been verfied, call table creation function
      if($valid_input)
      {
        createTable($min_mcand, $max_mcand, $min_mplier, $max_mplier); 
      }
    }

    // Function for creating table
    function createTable($mcand_min, $mcand_max, $mplier_min, $mplier_max)
    {
        echo '<table border="1">';
        echo "<tr><td></td>";
        $first_col = $mcand_min;
        for($i = $mplier_min; $i<=$mplier_max; $i++)
        {
          echo "<td>$i</td>";
        }

        for($j = $mcand_min; $j<=$mcand_max; $j++)
        {
          echo "<tr>";
          echo "<td>$first_col</td>";
          for($k = $mplier_min; $k<=$mplier_max; $k++)
          { 
            $product = $j*$k;
            echo "<td>$product</td>";   
          }
          $first_col = $first_col +1;
        }
        echo "</table>";
    }    
  ?> 

</body>
</html>