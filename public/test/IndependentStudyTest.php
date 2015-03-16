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
  	$result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    if($status["result"] == true && count($status["reason"]) == 1)
    	$result = true;
    $this->assertEquals(true, $result);
  }

  public function test2991()
  {
  	$result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",2991);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    if($status["result"] == true && count($status["reason"]) == 0)
    	$result = true;
    $this->assertEquals(true, $result);
  }

  public function test3990()
  {
  	$result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    if($status["result"] == true && count($status["reason"]) == 1)
    	$result = true;
    $this->assertEquals(true, $result);
  }

  public function test4990()
  {
  	$result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",4990);
    $student->set("courses",$course);
    $status = checkIndependentStudy($student);
    if($status["result"] == true && count($status["reason"]) == 1)
    	$result = true;
    $this->assertEquals(true, $result);
  }


  public function testCount5InStudy()
  { 
  	$result =false;
    $student = new StudentProfile();
     $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course4 = new Course();
    $course5 = new Course();

    $course1->set("courseNumber",4990);
    $course1->set("courseTitle","test1");
    
    $student->set("courses",$course1);
    $course2->set("courseNumber",3990);
    $course2->set("courseTitle","test2");
   
    $student->set("courses",$course2);
    $course3->set("courseNumber",2990);
    $course3->set("courseTitle","test3");
    
    $student->set("courses",$course3);
    $course4->set("courseNumber",4990);
    $course4->set("courseTitle","test4");
    
    $student->set("courses",$course4);
    $course5->set("courseNumber",3990);
    $course5->set("courseTitle","test5");
    
    $student->set("courses",$course5);
       
    $status = checkIndependentStudy($student);
    if($status["result"] == true && count($status["reason"]) == 5)
    	$result = true;
    $this->assertEquals(true, $result);
  }
  /* public function testCountE5InStudy()
  {
    $student = new StudentProfile();
    $course1 = new Course();
    $course2 = new Course();
    $course3 = new Course();
    $course4 = new Course();
    $course5 = new Course();
    $course1->set("courseNumber",4990);
    $course1->set("courseTitle","test1");
    $student->set("courses",$course1);
    $course2->set("courseNumber",3990);
    $course2->set("courseTitle","test2");
    $student->set("courses",$course2);
    $course3->set("courseNumber",2990);
    $course3->set("courseTitle","test3");
    $student->set("courses",$course3);
    $course4->set("courseNumber",4990);
    $course4->set("courseTitle","test4");
    $student->set("courses",$course4);
    $course5->set("courseNumber",3990);
    $course5->set("courseTitle","test5");
    $student->set("courses",$course5);
    $status = checkIndependentStudy($student);
    $this->assertEquals(5, count($status["reason"]));
  }*/
}

