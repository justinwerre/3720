<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/IndependentStudyTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class check30004000Test extends PHPUnit_Framework_TestCase
{
  public function testOne3000()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3000);
    $student->set("courses",$course);
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }


}
