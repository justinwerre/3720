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
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2880);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 1 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
     
  public function test2879()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2879);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test2881to2885()
  {
    $result = false;
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
    if(count($status["reason"]) == 5 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test2886()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2886);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test3880to3885()
  {
    $result = false;
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
    if(count($status["reason"]) == 6 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
       
  public function test3879()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3879);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test3886()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3886);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test4880to4885()
  {
    $result = false;
    $student = new StudentProfile();
    $course0 = new Course();
    $course0->set("courseNumber",4880);
    $course1 = new Course();
    $course1->set("courseNumber",4881);
    $course2 = new Course();
    $course2->set("courseNumber",4882);
    $course3 = new Course();
    $course3->set("courseNumber",4883);
    $course4 = new Course();
    $course4->set("courseNumber",4884);
    $course5 = new Course();
    $course5->set("courseNumber",4885);
    $student->set("courses",$course0);
    $student->set("courses",$course1);
    $student->set("courses",$course2);
    $student->set("courses",$course3);
    $student->set("courses",$course4);
    $student->set("courses",$course5);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 6 && $status["result"] == false)
        $result = true;
    $this->assertEquals(true, $result);
  }
 
  public function test4879()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",4879);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
             
  public function test4886()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",4886);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
}
