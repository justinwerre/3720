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
		
		public function testFour4000()
		{
			$student = new StudentProfile();
			for($i = 0; $i <= 4; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}

			$econCheck = new EconGradCheck($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['4thousands']["result"]);
		}
		
		public function testThree4000()
		{
			$student = new StudentProfile();
			for($i = 0; $i <= 3; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}

			$econCheck = new EconGradCheck($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['4thousands']["result"]);
		}
		
		public function testNonEconCourses()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",4001);
			$course->set("department", "CPSC");
			$student->set("courses", $course);
			
			for($i = 0; $i <= 2; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4001+$i);
				$course->set("department", "ECON");
				$student->set("courses", $course);
			}

			$econCheck = new EconGradCheck($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['4thousands']["result"]);
		}
	}
?>