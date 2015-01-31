<?php
  error_reporting(E_ALL);
  $file = fopen("T.lis", "r");
    while(!feof($file)){
      $line = fgets($file);
      $arr = explode(" ", $line);
      if(ctype_upper($arr[0])){
        echo $line;
        echo "<br>";
      }
    }
?>