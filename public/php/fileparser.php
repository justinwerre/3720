<?php
  require_once "Course.php";
  require_once "StudentProfile.php";

    // Rename .lis to T.lis and place in php folder
    error_reporting(E_ALL);
    $file = fopen("T.lis", "r");
    $student = new StudentProfile();
    $gpaLine;


    while(!feof($file))
    { 
      $dept = "";
      $cNum = 0;
      $cTitle = "";
      $weightCR = 0;
      $tPoints = 0;

      $line = fgets($file);
      $arr = explode(" ", $line);

      //Save GPA line and overlap, when end of file is found, the last one saved will have total GPA
      if($line[0] = "Current")
      {
        echo $line[0];
        //var_dump($line);
      }

      //~~~Parse out courses~~~//
      if(ctype_upper($arr[0]))
      {
      	$size = count($arr);
        $justCredit = false;
      	//If course is a withdrawl, just skip, if it is just for credit, get weight and set flag to skip getting total points in cTitle loop.
      	if($arr[$size-1][0] == '-')
      	{

          if($arr[$size-7] == 3)
          {
            //Credit course
            $weightCR = $arr[$size-7];
            $justCredit = true;
          }
          else
          {
            //Withdraw
      		  continue;
          }
      	}

        $dept = $arr[0];
        $cNum = $arr[1];

        //Special case for management, note that the arr index will be shifted compared to all other courses
        $i = 2;
        if($dept == "MGT")
        {
        	$i = 3;
        }

        //Loop to get title
        for(; $i < $size; $i++)
        {
        	//var_dump($arr[$i]);
        	$temp = $arr[$i];
        	//var_dump($temp);
        	if(is_numeric($temp) == False)
        	{
        		//echo "TRUE" . $temp . " ";
        		$cTitle = $cTitle . " " . $arr[$i];
        	}
        	else if($justCredit == false)
        	{
        		for($j = $size-2; $j > 0; $j--)
        		{
        			if(is_numeric($arr[$j]))
        			{
        				$weightCR = $arr[$j];
        				break;
        			}
        		}
        		$tPoints = $arr[$size-1];
        		break;
        	}
        }

        $course = new Course();
        $course->set("department", $dept);
        $course->set("courseNumber", $cNum);
        $course->set("courseTitle", $cTitle);
        $course->set("weight", $weightCR);
        $course->set("totalPoints", $tPoints);

        $student->set("courses", $course);

        //echo $dept . " " . $cNum . " " . $cTitle . " " . $weightCR . " " . $tPoints . "<br>";
      }
    }

    /*$temp = $student->get("courses");
    for($i = 0; $i < count($temp); $i++)
    {
      echo $temp[$i]->get("department") . "<br>";
    }*/
?>