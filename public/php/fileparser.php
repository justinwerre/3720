<?php
  require_once "Course.php";
  require_once "StudentProfile.php";

  function parseFile($filename, $students)
  {
    // Rename .lis to T.lis and place in php folder
    error_reporting(E_ALL);
    $continueParsing = false;
    $file = fopen($filename, "r");
    $student = new StudentProfile();
    $gpaLine;
    $faculty = "";
    $program = "";
    $major = "";
    $name = "";
    $lineCount = 0;
    $totalCreditHours = 0;
    $transferCredit = false;
    
    while(!feof($file))
    { 
      $dept = "";
      $cNum = 0;
      $cTitle = "";
      $weightCR = 0;
      $lineCount++;
      $tPoints = 0;

      $line = fgets($file);
      $arr = explode(" ", $line);
      
      

      //Get name
      // double check this for multiple transcripts
      if($lineCount == 3)
      {
        $name = $arr[0];
        for($i = 1; $i < 3; $i++)
        {
          if(!is_numeric($arr[$i]))
          {
            $name = $name . " " . $arr[$i];
          }
          else
          {
            break;
          }
        }
        $student->set("name", $name);
      }
      
      //Find faculty value and write it to student profile class
      if($arr[0] == "Faculty:")
      {
        $faculty = $arr[1];
        for($i = 2; $i < count($arr); $i++)
        {
          if($i < count($arr) - 1)
          {
            if($arr[$i].$arr[$i+1] != "")
            {
              $faculty = $faculty . " " . $arr[$i];
            }
            else
            {
              break; 
            }
          }
        }
        $student->set("faculty",$faculty);
        //Find program value and write it to student profile class
        for($j = count($arr) - 1; $j >= 0; $j--)
        {
          if($arr[$j] != "Program:")
          {
            $program = $arr[$j] . " " . $program;
          }
          else
          {
            break; 
          }
        }
        $student->set("program",$program);
      }
      //Find GPA Line and get total GPA, over write until last one is found.
      if($arr[0] == "Current")
      {
        $gpaLine = explode(" ", $line);
        $student->set("GPA", $gpaLine[8]);
      }
      //Find major value and write it to student profile class
      if($arr[0] == "Major:")
      {
        $major = $arr[1];
        for($i = 2; $i < count($arr); $i++)
        {
          if($i < count($arr))
              $major = $major . " " . $arr[$i];
        }
        $student->set("major",$major);
      }
      
      /* 
       * Transfer Credit Parser
       */
      
      if ($transferCredit == true)
      {
      	if (sizeof($arr) > 1)
      	{
      		// begin transfer credit parsing
      		$dept = $arr[7];
      		if ($arr[8] != "UNSPEC")
      		{
      			$cNum = $arr[8];
      			$weightCRStr = $arr[9];
      			$weightCR = $weightCRStr[1];
      			$cTitle = "Transfer Credit";
      		}
      		// set UNSPEC to 2550
      		else
      		{
      			$cNumStr = $arr[9];
      			$cNumDigit = $cNumStr[1];
      			switch ($cNumDigit)
      			{
      				case "1":
      					$cNum = 1999;
      					break;
      				case 2:
      					$cNum = 2999;
      					break;
      				case 3:
      					$cNum = 3999;
      					break;
      				case 4:
      					$cnum = 4999;
      					break;
      			}
      			$weightCRStr = $arr[11];
      			$weightCR = $weightCRStr[1];
      			$cTitle = "Transfer Credit";
      		}
      		$course = new Course();
	        $course->set("department", $dept);
	        $course->set("courseNumber", $cNum);
	        $course->set("courseTitle", $cTitle);
	        $course->set("weight", $weightCR);
	        $course->set("totalPoints", $tPoints);
	        
	        $totalCreditHours += $weightCR;

	        $student->set("courses", $course);
      	}
      	else
      	{
      		//set transfer credit flag to false if last line of transfer credits reached
      		$transferCredit = false;
      	}
      	// var_dump($arr);
      	
      }
      //check if array[7] can be checked
      if (sizeof($arr) > 7)
      {
      	// if "TRANSFER" appears on the 7th spot, set transfer credit flag to true
      	if($arr[7] == "TRANSFER")
      	{
      		$transferCredit = true;
      	}
      }

      //~~~Parse out courses~~~//
      if(ctype_upper($arr[0])) 
      {
      	$size = count($arr);
        $justCredit = false;
      	//If course is a withdrawl, just skip, if it is just for credit, get weight and set flag to skip getting total points in cTitle loop.
      	if(($arr[$size-1][0] == '-')||($arr[$size-1][0] == '0'))
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

        //Special case for 3 letter depts, note that the arr index will be shifted compared to all other courses
        $i = 2;
        
        //echo strlen($arr[1]);
        if(strlen($arr[1]) != 4)
        {
        	$i = 3;
            $cNum = $arr[2];
        }

        //Loop to get title
        for(; $i < $size; $i++)
        {
        	$temp = $arr[$i];

        	if(is_numeric($temp) == False)
        	{
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
        
        $totalCreditHours += $weightCR;

        $student->set("courses", $course);
      }
      
      /* Section for processing multiple transcripts */

      //if the row has multiple items in it
      if (count($arr) > 1)
      {
      	// if end of transcript has been reached
			if ($arr[1]=="End")
	  	{
	  		//add student to array of students
	  		$student->set("creditHours", $totalCreditHours);
	  		$students[] = $student; 
	  		//create a new student profile and reset attribute values
	  		$student = new StudentProfile();
		    $gpaLine;
		    $faculty = "";
		    $program = "";
		    $major = "";
		    $name = "";
		    $totalCreditHours = 0;
        $lineCount = 0;

	  	}
	  }
    }
    
    fclose($file);
    return $students;
  }


?>