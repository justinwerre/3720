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
    $course->set("department","ADCS");
    $course->set("courseNumber",2000);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testOne7CrhrADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","ADCS");
    $course->set("courseNumber",2000);
    $course->set("weight",7);
    $student->set("courses",$course);
    $status = checkNonfacultyCrhrs($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testThree3CrhrADCS()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course1->set("department","ADCS");
    $course1->set("courseNumber",2000);
    $course1->set("weight",3);
    $course2->set("department","ADCS");
    $course2->set("courseNumber",2001);
    $course2->set("weight",3);
    $course3->set("department","ADCS");
    $course3->set("courseNumber",2002);
    $course3->set("weight",3);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
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