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
        "threeThousandsFourThousands" => check30004000Courses($studentProfile),
        "nonfacultyCrhrs" => checkNonfacultyCrhrs($studentProfile),
        "maxActivityCreditHours" => checkMusePhacMax($studentProfile),
        "maxAppliedStudyCreditHours" => checkAppliedStudy($studentProfile),
        "max24Discipline" => check24Discipline($studentProfile),
        "max5IndStudy" => checkIndependentStudy($studentProfile)
      );  
    }
    
    public function get(){
      return $this->requirements;
    }
    
    public function __destruct()
    {}
  }
  // returns true if student has at least a 2.0 GPA
  function checkGPA($studentProfile)
  {
    return array(
      "result" => $studentProfile->get("GPA") >= 2,
      "reason" => $studentProfile->get("GPA")
    );
  }
  // returns true if student has at least 120 credit hours
  function checkCreditHours($studentProfile)
  {
    //total credit hours is the sum of completed courses and in progress courses
    $totalCreditHours = $studentProfile->get("creditHours");
    return array(
      "result" => $totalCreditHours >= 120,
      "reason" => $totalCreditHours
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
  	$independentStudyCourses = array();
  	$courses = $studentProfile->get("courses");
   	
  	foreach($courses as  $course)
  	{ 
       
  	  	$courseNumber = $course->get("courseNumber");
        if($courseNumber == 2990 || $courseNumber == 3990 || $courseNumber == 4990) 
  		  {
  			  
          $independentStudyCourses[] = $course->toArray();
          
  		  }
  	
    }

  	return array
  	(
      "result" => count($independentStudyCourses)<=5,
      "reason" => $independentStudyCourses
    );
  }

  // returns array of applied studies courses; only 15 credit hours from applied studies courses are counted
  function checkAppliedStudy($studentProfile)
  {
    $appliedStudyCourses = array();
    $courses = $studentProfile->get("courses");
    foreach($courses as  $course)
  	{
        $courseNumber = $course->get("courseNumber");
  	 	if(($courseNumber >= 2980 && $courseNumber <= 2985) || ($courseNumber >= 3980 && $courseNumber <= 3985) || ($courseNumber >= 4980 && $courseNumber <= 4985))
  		{
  			$appliedStudyCourses[] = $course->toArray();
  		}
    }
    return array
  	(
      "result" => count($appliedStudyCourses) <= 5,
      "reason" => $appliedStudyCourses
    ); 
  }

  // returns array of Activity Courses; only 6 credit hours from activity courses are counted
  // 12 credit hours for Music majors and 10 credit hours for Kinesiology majors
  function checkMusePhacMax($studentProfile)
  {
    $maxCourses = 0;
    if(trim($studentProfile->get("major")) == "Music")
    {
      $maxCourses = 8;
    }
    elseif(trim($studentProfile->get("major")) == "Kinesiology")
    {
      $maxCourses = 10;
    }
    else
    {
      $maxCourses = 4;   
    }
    $musePhacMaxCourses = array();
    $courses = $studentProfile->get("courses");
    foreach($courses as  $course)
  	{
      $department = $course->get("department");
      if($department == "MUSE" || $department == "PHAC")
      {
  		$musePhacMaxCourses[] = $course->toArray();
      }
    }
    return array
  	(
      "result" => count($musePhacMaxCourses) <= $maxCourses,
      "reason" => $musePhacMaxCourses
    ); 
  }

  // returns array of courses of discipline of most credit hours; maximum is 24 from any discipline
  function check24Discipline($studentProfile)
  {
    $max24Discipline = array();
    $largest = array();
    $list = array();
    $sizeLargest = 0;
    $department = "";
    $courses = $studentProfile->get("courses");
    foreach($courses as  $course)
  	{
      $tempArray = array();
      $tempArray[] = $course;
      $department = $course->get("department");
      if($department != "PHAC" && $department != "MUSE")
      {
        if(!array_key_exists($department, $max24Discipline))
        {
          $max24Discipline[$department] = $tempArray;
        }
        else
        {
          $max24Discipline[$department] = array_merge($max24Discipline[$department], $tempArray);
        }
      }
    }
    foreach($max24Discipline as $dept)
    {
      if(count($dept) > $sizeLargest)
      {
        $sizeLargest = count($dept);
        $largest = $dept;
        $department = $dept[0]->get("department");
      }
      elseif(count($dept) == $sizeLargest)
      {
        $department = $department . "," . $dept[0]->get("department");
      }
    }
    foreach($largest as $course)
    {
      $list[] = $course->toArray();
    }
    return array
  	(
      "result" => $sizeLargest <= 24,
      "reason" => $list,
      "dept" => $department
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
            && $department != "EDUC" && $department != "HLSC" && $department != "MGT"
            && $department != "NURS" && $department != "PUBH" && $department != "MUSE"
            && $department != "PHAC")
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
    $totWeight=0.0;
    $courseList = array();
    foreach($studentProfile->get("courses") as $course)
    {
      $department = $course->get("department");
      if ($department=="ADCS" || $department=="CDEV" || $department=="CRED" || $department=="EDUC" 
        || $department=="HLSC" || $department=="MGT" || $department=="NURS" || $department=="PUBH")
      {
        $totWeight += $course->get("weight");
        $courseList[] = $course->toArray();
      }
    }
    return array(
      "result" => $totWeight <= 12,
      "reason" => $courseList
    );
  }
?>
