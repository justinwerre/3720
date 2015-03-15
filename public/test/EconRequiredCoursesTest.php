<?php
	require_once __DIR__."/../php/StudentProfile.php";
	require_once __DIR__."/../php/Course.php";
	require_once __DIR__."/../php/EconRequirementsChecker.php";


	class econRequiredCoursesTest extends PHPUnit_Framework_TestCase
	{
		public function testEcon1010()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",1010);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]));
		}
		
		public function testNonEconCourse()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",1010);
			$course->set("department", "MATH");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(0, count($test['requiredCourses']["reason"]));
		}
		
		public function testNonRequiredEconCourse()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",1000);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(0, count($test['requiredCourses']["reason"]));
		}
		
		public function testEcon1012()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber",1012);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]));
		}
		
		public function testEcon2750()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 2750);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]));
		}
		
			public function testEcon2900()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 2900);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]));
		}
	}
?>