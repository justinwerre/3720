<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/IndependentStudyTest.php
*/
require_once "/vagrant/public/php/StudentProfile.php";
require_once "/vagrant/public/php/Course.php";
require_once "/vagrant/public/php/RequirementsChecker.php";

class IndependentStudyCheckerTest extends PHPUnit_Framework_TestCase
{
  public function test2990()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function test2991()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2991);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function test3990()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(true, $status["result"]);
  }
}
