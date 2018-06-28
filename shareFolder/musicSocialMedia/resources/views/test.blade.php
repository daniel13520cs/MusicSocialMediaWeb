<?php






echo '<table border="1"  id="table1">';

  for($i=1;$i<=9;$i++)

  {


    //echo "<tr>";
    echo "<td>".$i."</td>";
    
    if ($i % 3 == 0){
        echo "<tr></tr>";  
    }


  }

  echo '</table>';

  function fibonacci($n){
      if($n == 0){
          return 0;
      }
      if($n == 1){
          return 1;
      }
    
      return fibonacci($n -1) + fibonacci($n - 2);
  }

  for($k = 0; $k < 10; $k++){
    echo fibonacci($k). ",";
  }