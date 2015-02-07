<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290 Assignment 4</title>

</head>
<body>
   <?php 

    $min_mcand = $_GET['min-multiplicand'];
    $max_mcand = $_GET['max-multiplicand'];
    $min_mplier = $_GET['min-multiplier'];
    $max_mplier = $_GET['max-multiplier'];
    $valid_input = true;
    $tmp =  is_int($min_mcand);
    echo $tmp;
    if (!isset($_GET['min-multiplicand']) || !isset($_GET['max-multiplicand']) || !isset($_GET['min-multiplier']) ||!isset($_GET['max-multiplier']) )
    {
      echo "You are missing one or more parameters. Please fix this.";
      $valid_input = false;
    }
    else
    {
    if(ctype_digit($min_mcand) != TRUE)
    {

      echo "<h1>$min_mcand is not an integer.</h1>";

    }

    // TODO: VALID NUMBER CHECKS

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
    }

    if($valid_input)
    {
      createTable($min_mcand, $max_mcand, $min_mplier, $max_mplier); 
    }
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