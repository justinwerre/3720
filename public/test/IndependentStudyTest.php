<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/IndependentStudyTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class IndependentStudyCheckerTest extends PHPUnit_Framework_TestCase
{
  public function test2990()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(1, count($status["reason"]));
  }

  public function test2991()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2991);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(0, count($status["reason"]));
  }

  public function test3990()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(1, count($status["reason"]));
  }

  public function test4990()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",4990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    $this->assertEquals(1, count($status["reason"]));
  }

  public function testCountInStudy()
  {
    $student = new StudentProfile();
    $course1 = new Course();
     $course2 = new Course();
    $course1->set("courseNumber",4990);
    $student->set("courses",$course1);
    $course2->set("courseNumber",3990);
    $student->set("courses",$course2);
    $status = checkIndependentStudy($student);
    $this->assertEquals(0, count($status["reason"]));
  }

}
