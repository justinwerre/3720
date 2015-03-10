<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/IndependentStudyTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class check30004000Test extends PHPUnit_Framework_TestCase
{
  public function testOne3000()
  {
    $student = new StudentProfile();
    $course = new Course();
    $course->set("courseNumber",3000);
    $student->set("courses",$course);
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }


  public function testFifteen3000()
  {
    $student = new StudentProfile();
    for($i=0;$i<15;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testFifteen3000WithADCS()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "ADCS");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithCDEV()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "CDEV");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithCRED()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "CRED");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithEDUC()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "EDUC");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithHLCS()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "HLCS");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithMGT()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "MGT");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithNURS()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "NURS");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen3000WithPUBH()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "PUBH");
	$course->set("courseNumber", 3000);
	$student->set("courses", $course);
    for($i=0;$i<14;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }
}
