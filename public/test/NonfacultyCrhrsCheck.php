<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/30004000Test.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class nonfacultyCrhrsTest extends PHPUnit_Framework_TestCase
{
  public function testOneADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","HDCS");
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testOne7CrhrADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","HDCS");
    $course->set("weight",7);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  // if($department != "ADCS" && $department != "CDEV"&& $department != "CRED"
  //           && $department != "EDUC" && $department != "HLCS" && $department != "MGT"
  //           && $department != "NURS" && $department != "PUBH")
  //       {
  //         $courses[] = $course->toArray();
  //       }

}
