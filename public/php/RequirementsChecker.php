<?php
  class RequirementsChecker
  {
    
    public function __construct()
    {}
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
        $courses[] = $course;
      }
    }
    return array(
      "result" => count($courses) <= 12,
      "reason" => $courses
    );
  } 
?>
