<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/AppliedStudyTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class AppliedStudyCheckerTest extends PHPUnit_Framework_TestCase
{
  public function test2880()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2880);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    $this->assertEquals(1, count($status["reason"]));
  }
}
