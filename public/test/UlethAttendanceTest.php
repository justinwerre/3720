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
/*
  public function testLastUnder30HoursAttendance()
  {
  	$student = new StudentProfile();
    $course = new Course();
    $course->set("department", "Transfer Credit");
    $student->set("courses", $course);
  	//5 * 3 weight = 15
  	for($i=0;$i<5;$i++)
    {
     	$course = new Course();
     	$course->set("department", "TEST");
     	$student->set("courses", $course);
    }
    $status = checkUlethLast30Attendance($student);
    $this->assertEquals(false, $status["result"]);
  }

  public function testLastOver30HoursAttendance()
  {
  	$student = new StudentProfile();
  	//15 * 3 weight = 45
  	for($i=0;$i<15;$i++)
    {
      	$course = new Course();
      	$course->set("department", "TEST");
      	$student->set("courses", $course);
    }
    $status = checkUlethLast30Attendance($student);
    $this->assertEquals(true, $status["result"]);
  }*/
}
?>