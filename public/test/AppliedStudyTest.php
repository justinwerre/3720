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
  public function test2980()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2980);
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

  public function test2981to2985()
  {
    $result = false;
    $student = new StudentProfile();
    $course1 = new Course();
    $course1->set("courseNumber",2981);
    $course2 = new Course();
    $course2->set("courseNumber",2982);
    $course3 = new Course();
    $course3->set("courseNumber",2983);
    $course4 = new Course();
    $course4->set("courseNumber",2984);
    $course5 = new Course();
    $course5->set("courseNumber",2985);
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

  public function test2986()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2986);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test3980to3985()
  {
    $result = false;
    $student = new StudentProfile();
    $course0 = new Course();
    $course0->set("courseNumber",3980);
    $course1 = new Course();
    $course1->set("courseNumber",3981);
    $course2 = new Course();
    $course2->set("courseNumber",3982);
    $course3 = new Course();
    $course3->set("courseNumber",3983);
    $course4 = new Course();
    $course4->set("courseNumber",3984);
    $course5 = new Course();
    $course5->set("courseNumber",3985);
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

  public function test3986()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3986);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }

  public function test4980to4985()
  {
    $result = false;
    $student = new StudentProfile();
    $course0 = new Course();
    $course0->set("courseNumber",4980);
    $course1 = new Course();
    $course1->set("courseNumber",4981);
    $course2 = new Course();
    $course2->set("courseNumber",4982);
    $course3 = new Course();
    $course3->set("courseNumber",4983);
    $course4 = new Course();
    $course4->set("courseNumber",4984);
    $course5 = new Course();
    $course5->set("courseNumber",4985);
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
             
  public function test4986()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",4986);
    $student->set("courses",$course);
    $status = checkAppliedStudy($student);
    if(count($status["reason"]) == 0 && $status["result"] == true)
        $result = true;
    $this->assertEquals(true, $result);
  }
}
