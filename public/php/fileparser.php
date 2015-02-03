<?php
  // Rename .lis to T.lis and place in php folder
  error_reporting(E_ALL);
  $file = fopen("T.lis", "r");
    while(!feof($file))
    { 
      $dept = "";
      $cNum = 0;
      $cTitle = "";

      $line = fgets($file);
      $arr = explode(" ", $line);

      if(ctype_upper($arr[0]))
      {
        $dept = $arr[0];
        $cNum = $arr[1];

        //TO DO: Special case for management, note that the arr index will be shifted compared to all other courses
        if($dept == "MGT")
        {
        	echo "LOL THIS IS MGT";
        }

        for($i = 2; $i < count($arr); $i++)
        {
        	//var_dump($arr[$i]);
        	$temp = $arr[$i];
        	//var_dump($temp);
        	if(is_numeric($temp) == False)
        	{
        		//echo "TRUE" . $temp . " ";
        		$cTitle = $cTitle . " " . $arr[$i];
        	}
        	else
        	{
        		break;
        	}
        }

        //echo $line;
        //echo $cTitle;
        echo $dept . " " . $cNum . " " . $cTitle;
        echo "<br>"; 
      }
    }
?>
