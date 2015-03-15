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
				$course->set("courseNumber",4000);
				$course->set("department", "ECON");
				$student->set("courses",$course);
			}
			
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['classes']["result"]);
		}
	}
?>