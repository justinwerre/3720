<?php
/*
 * run phpunit command from public folder
 * phpunit --bootstrap php/RequirementsChecker.php test/UlethAttendanceTest.php
*/
require_once __DIR__."/../php/StudentProfile.php";
require_once __DIR__."/../php/Course.php";
require_once __DIR__."/../php/RequirementsChecker.php";

class checkUlethAttendanceTest extends PHPUnit_Framework_TestCase
{/*
  public function testTotalUnder60HoursAttendance()
  {
    $student = new StudentProfile();
    for($i=0;$i<3;$i++)
    {
   		$course = new Course();
    	$course->set("department", "Transfer Credit");
    	$student->set("courses", $course);
    }
    //19 * 3 weight = 57
    //Adding Transfer credits should still cause a failure
    for($i=0;$i<19;$i++)
    {
      $course = new Course();
      $course->set("courseTitle", "TEST");
      $student->set("courses", $course);
	}
	$status = checkUlethTotal60Attendance($student);
	$this->assertEquals(false, $status["result"]);
   }*/

  public function testTotalOver60HoursAttendance()
  {  
  	$result = false;
  	$student = new StudentProfile();
  	$course = new Course();
    $course->set("courseTitle", "Transfer Credit");
    $student->set("courses", $course);
   	//25 * 3 weight = 75
    for($i=0;$i<25;$i++)
    {
     	$course = new Course();
     	$course->set("courseTitle", "TEST");
     	$course->set("weight", 3);
     	$student->set("courses", $course);
	}
	$status = checkUlethTotal60Attendance($student);
	if(count($status["reason"]) > 10)
    	$result = true;
    $this->assertEquals(true, $result);
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