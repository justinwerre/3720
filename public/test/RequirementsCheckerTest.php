<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/RequirementsCheckerTest.php
*/
require_once "../php/StudentProfile.php";
require_once "../php/Course.php";

class RequirementsCheckerTest extends PHPUnit_Framework_TestCase
{
  public function testGPAGreaterThanTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 3.99);
    $status = checkGPA($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function testGPAlessThanTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 1.0);
    $status = checkGPA($student);
    $this->assertEquals(false, $status["result"]);
  }
  
  public function testGPAEqualsTwo()
  {
    $student = new StudentProfile();
    $student->set("GPA", 2.0);
    $status = checkGPA($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function testCreditHoursGreaterThan120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 121);
    $status = checkCreditHours($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function testCreditHoursLessThan120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 119);
    $status = checkCreditHours($student);
    $this->assertEquals(false, $status["result"]);
  }
  
  public function testCreditHoursEquals120()
  {
    $student = new StudentProfile();
    $student->set("creditHours", 120);
    $status = checkCreditHours($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function test1000CoursesLessThan12()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department", "MATH");
    $course->set("courseNumber", 1000);
    $student->set("courses", $course);
    $status = check1000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function test1000CoursesGreaterThan12()
  {
    $student = new StudentProfile();
    for($i=0;$i<50;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000);
      $student->set("courses", $course);
    }
    $status = check1000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }
  
  public function test1000CoursesEquals12()
  {
    $student = new StudentProfile();
    for($i=0;$i<12;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000);
      $student->set("courses", $course);
    }
    $status = check1000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function test1000CoursesDoesNotCount2000Level()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber", 2000);
    $student->set("courses", $course);
    for($i=0;$i<12;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000);
      $student->set("courses", $course);
    }
    $status = check1000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function test1000CoursesDoNotCountPHAC()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber", 1000);
    $course->set("department", "PHAC");
    $student->set("courses", $course);
    for($i=0;$i<12;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000);
      $student->set("courses", $course);
    }
    $status = check1000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }
  
  public function test1000CoursesDoNotCountMUSE()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber", 1000);
    $course->set("department", "MUSE");
    $student->set("courses", $course);
    for($i=0;$i<12;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000);
      $student->set("courses", $course);
    }
    $status = check1000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }
}
