<?php
	require_once __DIR__."/../php/StudentProfile.php";
	require_once __DIR__."/../php/Course.php";
	require_once __DIR__."/../php/EconGradCheck.php";


	class econ4000Test extends PHPUnit_Framework_TestCase
	{
		public function testOne4000()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",4000);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconGradCheck($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['4thousands']["result"]);
		}
	}
?>