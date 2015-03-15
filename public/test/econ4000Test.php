<?php
	require_once __DIR__."/../php/StudentProfile.php";
	require_once __DIR__."/../php/Course.php";
	require_once __DIR__."/../php/EconRequirementsChecker.php";


	class econ4000Test extends PHPUnit_Framework_TestCase
	{
		public function testOne4000()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",4000);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['4thousands']["result"]);
		}
		
		public function testFour4000()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 4; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4001+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}

			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['4thousands']["result"]);
		}
		
		public function testThree4000()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 3; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4001+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}

			$econCheck = new EconRequirementsChecker($student);
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
			
			for($i = 0; $i < 2; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4001+$i);
				$course->set("department", "ECON");
				$student->set("courses", $course);
			}

			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['4thousands']["result"]);
		}
		
		public function testCourseNumber4000()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 4000);
			$course->set("department", "ECON");
			$student->set("courses", $course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['4thousands']['reason']));
		}
		
		public function testTwoEconCourses()
		{
			$student = new StudentProfile();
			$course1 = new Course();
			$course1->set("courseNumber", 4000);
			$course1->set("department", "ECON");
			$student->set("courses", $course1);
			$course2 = new Course();
			$course2->set("courseNumber", 4001);
			$course2->set("department", "ECON");
			$student->set("courses", $course2);
			$course3 = new Course();
			$course3->set("courseNumber", 4000);
			$course3->set("department", "CPSC");
			$course3->set("courses", $course3);
			
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(2, count($test['4thousands']['reason']));
		}
	}
?>