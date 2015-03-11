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
     
  public function test2879()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2879);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    $this->assertEquals(0, $status["result"]);
  }

  public function test2881to2885()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course1->set("courseNumber",2881);
    $course2 = new Course();
    $course2->set("courseNumber",2882);
    $course3 = new Course();
    $course3->set("courseNumber",2883);
    $course4 = new Course();
    $course4->set("courseNumber",2884);
    $course5 = new Course();
    $course5->set("courseNumber",2885);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $student->set("courses",$course4);
    $student->set("courses",$course5);
    $status = checkAppliedStudy($student);
    $this->assertEquals(5, count($status["reason"]));
  }

    //should have named it test2886
  public function test2886()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2886);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    $this->assertEquals(0, count($status["reason"]));
  }

  public function test3880to3885()
  {
    $student = new StudentProfile();
    $course0 = new Course();
    $course0->set("courseNumber",3880);
    $course1 = new Course();
    $course1->set("courseNumber",3881);
    $course2 = new Course();
    $course2->set("courseNumber",3882);
    $course3 = new Course();
    $course3->set("courseNumber",3883);
    $course4 = new Course();
    $course4->set("courseNumber",3884);
    $course5 = new Course();
    $course5->set("courseNumber",3885);
    $student->set("courses",$course0);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $student->set("courses",$course4);
    $student->set("courses",$course5);
    $status = checkAppliedStudy($student);
    $this->assertEquals(6, count($status["reason"]));
  }
         
  public function test3879()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3879);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    $this->assertEquals(0, $status["result"]);
  }
}
