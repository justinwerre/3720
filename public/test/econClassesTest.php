<?php
	require_once __DIR__."/../php/StudentProfile.php";
	require_once __DIR__."/../php/Course.php";
	require_once __DIR__."/../php/EconRequirementsChecker.php";


	class econClassesTest extends PHPUnit_Framework_TestCase
	{
		public function test13EconClasses()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 13; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['classes']["result"]);
		}
		
		public function test15EconClasses()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 15; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['classes']["result"]);
		}
		
		public function test14EconClasses()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 14; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['classes']["result"]);
		}
		
		public function testNonEconClasses()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 13; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$course = new Course();
			$course->set("courseNumber",4000);
			$course->set("department", "CPSC");
			$student->set("courses",$course);
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['classes']["result"]);
		}
		
		public function testStat1770()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 13; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$course = new Course();
			$course->set("courseNumber",1770);
			$course->set("department", "STAT");
			$student->set("courses",$course);
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['classes']["result"]);
		}
		
		public function testEconCourseCount()
		{
			$student = new StudentProfile();
			for($i = 0; $i < 14; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",4000+$i);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$course = new Course();
			$course->set("courseNumber",1770);
			$course->set("department", "STAT");
			$student->set("courses",$course);
			
			for($i = 0; $i < 5; $i++)
			{
				$course = new Course();
				$course->set("courseNumber",1000+$i);
				$course->set("department", "MATH");
				$student->set("courses",$course);
			}
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(15, count($test['classes']["reason"]));
		}
	}
?>