<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/30004000Test.php
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

  public function testFifteen3000WithHLSC()
  {
    $student = new StudentProfile();
    $course = new Course();
	$course->set("department", "HLSC");
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

  public function testFifteen4000()
  {
    $student = new StudentProfile();
    for($i=0;$i<15;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 4000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testFifteen1000()
  {
    $student = new StudentProfile();
    for($i=0;$i<15;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 1000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testFifteen30004000()
  {
    $student = new StudentProfile();
    for($i=0;$i<8;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    for($i=0;$i<7;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 4000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testFourteen30004000Plus1000()
  {
    $student = new StudentProfile();
    for($i=0;$i<7;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    for($i=0;$i<7;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 4000+$i);
      $student->set("courses", $course);
    }
    $course = new Course();
    $course->set("department", "MATH");
    $course->set("courseNumber", 1000);
    $student->set("courses", $course);

    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testSixteen3000()
  {
    $student = new StudentProfile();
    for($i=0;$i<16;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 3000+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testFourteen3000Plus2999()
  {
    $student = new StudentProfile();
    for($i=0;$i<15;$i++)
    {
      $course = new Course();
      $course->set("department", "MATH");
      $course->set("courseNumber", 2999+$i);
      $student->set("courses", $course);
    }
    $status = check30004000Courses($student);
    $this->assertEquals(false, $status["result"]);
  }
    
  public function testHlsc3450()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","HLSC");
    $course->set("courseNumber",3450);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = check30004000Courses($student);
    if($status["result"] == false && count($status["reason"]) == 1)
        $result = true;
    $this->assertEquals(true, $result);
  }
    
  public function testMgt3780()
  {
    $result = false;
    $student = new StudentProfile();
    $course = new Course();
    $course->set("department","MGT");
    $course->set("courseNumber",3780);
    $course->set("weight",3);
    $student->set("courses",$course);
    $status = check30004000Courses($student);
    if($status["result"] == false && count($status["reason"]) == 1)
        $result = true;
    $this->assertEquals(true, $result);
  }
}
