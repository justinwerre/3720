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

  function check1000Courses($studentProfile)
  {
    return array(
      "result" => count($studentProfile->get("courses")) <= 12,
      "reason" => $studentProfile->get("courses")
    );

  } 
?>
