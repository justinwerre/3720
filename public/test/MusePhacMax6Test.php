<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/MusePhacMax6Test.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class MusePhacMaxCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testMuse()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $status = checkMusePhacMax($student);
    $this->assertEquals(1, count($status["reason"]));
  }

  public function testPhac()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","PHAC");
    $student->set("courses",$course);
    $status = checkMusePhacMax($student);
    $this->assertEquals(1, count($status["reason"]));
  }

  public function testMax6Activity()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course1->set("department","PHAC");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course1);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","PHAC");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course3);
    $course4 = new Course();
    $course4->set("department","MUSE");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course4);
    $course5 = new Course();
    $course5->set("department","PHAC");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course5);
    $course6 = new Course();
    $course6->set("department","MUSE");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course6);
    $course7 = new Course();
    $course7->set("department","PHAC");
    $student->set("creditHours", $student->get("creditHours") + 1.5);
    $student->set("courses",$course7);
    $status = checkMusePhacMax($student);
    $this->assertEquals(9, $student->get("creditHours"));
  }
}
