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
  return $studentProfile->get("GPA") > 2;
}
?>
