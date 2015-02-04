<?php
  class RequirementsChecker
  {
    
    public function __construct()
    {

    }
    public function __destruct()
    {
     
    }

  }
 
  function checkGPA($studentProfile)
  {
    return $studentProfile->get("GPA") >= 2;
  }

  function checkCreditHours($studentProfile)
  {
    return $studentProfile->get("creditHours") >= 120;
  }

  function check1000Courses($studentProfile)
  {
    return count($studentProfile->get("courses")) < 12;
  } 
?>
