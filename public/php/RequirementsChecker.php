<?php
  class RequirementsChecker
  {
    private $requirements;
    
    public function __construct($studentProfile)
    {
      $this->requirements = array(
        "GPA" => checkGPA($studentProfile),
        "creditHours" => checkCreditHours($studentProfile),
        "oneThousands" => check1000Courses($studentProfile),
        "threeThousandsFourThousands" => check30004000Courses($studentProfile)
      );  
    }
    
    public function get(){
      return $this->requirements;
    }
    
    public function __destruct()
    {}
  }
 
  function checkGPA($studentProfile)
  {
    return array(
      "result" => $studentProfile->get("GPA") >= 2,
      "reason" => $studentProfile->get("GPA")
    );
  }

  function checkCreditHours($studentProfile)
  {
    return array(
      "result" => $studentProfile->get("creditHours") >= 120,
      "reason" => $studentProfile->get("creditHours")
    );
  }

  // returns true if <= 12 1000 courses have been taken
  function check1000Courses($studentProfile)
  {
    $courses = array();
    foreach($studentProfile->get("courses") as $course){
      if($course->get("courseNumber") < 2000){
        // exclude activity courses
        if($course->get("department") != "PHAC" &&
          $course->get("department") != "MUSE"){
          $courses[] = $course->toArray();
        }
      }
    }
      
    return array(
      "result" => count($courses) <= 12,
      "reason" => $courses
    );
  } 

  // returns true if less than or equal to five independent Study courses have been taken
  function checkIndependentStudy($studentProfile)
  {
  	$isIndStudy = false;
  	$independentStudyCourses = array();
  	$courses = $studentProfile->get("courses");
  	
  	foreach($courses as  $course)
  	{ 
       
  	  	$courseNumber = $course->get("courseNumber");
  	 	if($courseNumber == 2990 || $courseNumber == 3990 || $courseNumber == 4990)
  		{
  			$isIndStudy = true;
  			$independentStudyCourses[] = $course;
  		}
  	
    }

  	return array
  	(
      "result" => $isIndStudy,
      "reason" => $independentStudyCourses
    );
  }

  function checkAppliedStudy($studentProfile)
  {
    $isAppStudy = true;
    $appliedStudyCourses = array();
    $courses = $studentProfile->get("courses");
    foreach($courses as  $course)
  	{
        $courseNumber = $course->get("courseNumber");
  	 	if(($courseNumber >= 2880 && $courseNumber <= 2885) || ($courseNumber >= 3880 && $courseNumber <= 3885) || ($courseNumber >= 4880 && $courseNumber <= 4885))
  		{
            $isAppStudy = true;
  			$appliedStudyCourses[] = $course;
  		}
        else
            $isAppStudy = false;
    }
    return array
  	(
      "result" => $isAppStudy,
      "reason" => $appliedStudyCourses
    ); 
  }


  // returns true if >= 15 3000 and 4000 arts or arts&sci courses have been taken
  function check30004000Courses($studentProfile)
  {
    $courses = array();
    foreach($studentProfile->get("courses") as $course){
      if ($course->get("courseNumber") >= 3000)
      {
        $department = $course->get("department");
        if($department != "ADCS" && $department != "CDEV"&& $department != "CRED"
            && $department != "EDUC" && $department != "HLCS" && $department != "MGT"
            && $department != "NURS" && $department != "PUBH")
        {
          $courses[] = $course->toArray();
        }
      }
    }
    return array(
      "result" => count($courses) >= 15,
      "reason" => $courses
    );
  } 
  // returns true if student took <= 12 crhrs outside of arts and arts & sci
  function checkNonfacultyCrhrs($studentProfile)
  {
    return array(
      "result" => false,
      "reason" => false
    );
  }


?>
