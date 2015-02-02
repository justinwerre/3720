<?php

  $filename = $_FILES['file']['tmp_name'];
  $file = fopen($filename, "r");
  while(!feof($file)){
    $line = fgets($file);
    $arr = explode(" ", $line);
    if(ctype_upper($arr[0])){
      echo $line;
      echo "<br>";
    }
  }
?>