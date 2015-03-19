<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/UlethAttendanceTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class checkUlethAttendanceTest extends PHPUnit_Framework_TestCase
{
  public function test60TotalUlethHoursNotIncludingTransfer()
  {
    $student = new StudentProfile();
    //Checking that it skips transfer courses
   	$course = new Course();
    $course->set("courseTitle", "Transfer Credit");
    $course->set("weight", 3);
    $student->set("courses", $course);
    //19 * 3 weight = 57
    for($i=0;$i<19;$i++)
    {
      $course = new Course();
      $course->set("courseTitle", "ULETH");
      $course->set("courseNumber",4000+$i);
      $course->set("weight", 3);
      $student->set("courses", $course);
	  }
	  $status = checkUleth60TotalAttendance($student);
	  $this->assertEquals(false, $status["result"]);
   }

  public function test60TotalHoursUleth()
  {
  	$student = new StudentProfile();
   	//25 * 3 weight = 75
    for($i=0;$i<25;$i++)
    {
     	$course = new Course();
     	$course->set("courseTitle", "ULETH");
      $course->set("courseNumber",4000+$i);
     	$course->set("weight", 3);
     	$student->set("courses", $course);
    }
	  $status = checkUleth60TotalAttendance($student);
    $this->assertEquals(true, $status["result"]);
  }

  public function testLast30AtUlethWithTransfer()
  {
    $student = new StudentProfile();
    //Checking that it dosen't count transfer courses
    $course = new Course();
    $course->set("courseTitle", "Transfer Credit");
    $course->set("weight", 3);
    $student->set("courses", $course);
    //9 * 3 weight = 27
    for($i=0;$i<9;$i++)
    {
      $course = new Course();
      $course->set("courseTitle", "ULETH");
      $course->set("courseNumber",4000+$i);
      $course->set("weight", 3);
      $student->set("courses", $course);
    }
    $status = checkUlethLast30Attendance($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testLast30AtUleth()
  {
    $student = new StudentProfile();
    //10 * 3 weight = 30
    for($i=0;$i<10;$i++)
    {
      $course = new Course();
      $course->set("courseTitle", "ULETH");
      $course->set("courseNumber",4000+$i);
      $course->set("weight", 3);
      $student->set("courses", $course);
    }
    $status = checkUlethLast30Attendance($student);
    $this->assertEquals(true, $status["result"]);
  }
}
?>