<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/24DisciplineTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class max24DisciplineCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testOneDiscipline()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testTwoDisciplines()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSI");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $student->set("courses",$course2);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function testTwoDisciplinesDiffAmtCourses()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSI");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSE");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSE");
    $course3->set("courseTitle","MUSE");
    $student->set("courses",$course3);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 2 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function testTwoDisciplinesDiffAmtSwap()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MUSE");
    $student->set("courses",$course);
    $course2 = new Course();
    $course2->set("department","MUSI");
    $student->set("courses",$course2);
    $course3 = new Course();
    $course3->set("department","MUSI");
    $course3->set("courseTitle","MUSE");
    $student->set("courses",$course3);
    $status = check24Discipline($student);
    if(count($status["reason"]) == 2 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
}
