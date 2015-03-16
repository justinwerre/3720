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
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
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
			$this->assertEquals(0, count($test['requiredCourses']["reason"]['taken']));
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
			$this->assertEquals(0, count($test['requiredCourses']["reason"]['taken']));
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
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
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
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
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
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
		}
		
		public function testEcon3010()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 3010);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
		}
		
		public function testEcon3012()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 3012);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
		}
		
		public function testEcon3950()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 3950);
			$course->set("department", "ECON");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
		}
		
		public function testStats1770()
		{
			$student = new StudentProfile();
			$course = new Course();
			$course->set("courseNumber", 1770);
			$course->set("department", "STAT");
			$student->set("courses",$course);
			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(1, count($test['requiredCourses']["reason"]['taken']));
		}

		public function testMeetsRequirements()
		{
			$student = new StudentProfile();
			// econ 1010
			$e1010 = new Course();
			$e1010->set("courseNumber", 1010);
			$e1010->set("department", "ECON");
			$student->set("courses", $e1010);

			// econ 1012
			$e1012 = new Course();
			$e1012->set("courseNumber", 1012);
			$e1012->set("department", "ECON");
			$student->set("courses", $e1012);

			// econ 2750
			$e2750 = new Course();
			$e2750->set("courseNumber", 2750);
			$e2750->set("department", "ECON");
			$student->set("courses", $e2750);

			// econ 2900
			$e2900 = new Course();
			$e2900->set("courseNumber", 2900);
			$e2900->set("department", "ECON");
			$student->set("courses", $e2900);

			// econ 3010
			$e3010 = new Course();
			$e3010->set("courseNumber", 3010);
			$e3010->set("department", "ECON");
			$student->set("courses", $e3010);

			// econ 3012
			$e3012 = new Course();
			$e3012->set("courseNumber", 3012);
			$e3012->set("department", "ECON");
			$student->set("courses", $e3012);

			// econ 3950
			$e3950 = new Course();
			$e3950->set("courseNumber", 3950);
			$e3950->set("department", "ECON");
			$student->set("courses", $e3950);

			// stats 1770
			$s1770 = new Course();
			$s1770->set("courseNumber", 1770);
			$s1770->set("department", "STAT");
			$student->set("courses", $s1770);

			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(true, $test['requiredCourses']["result"]);
		}

		public function testMissingStats()
		{
			$student = new StudentProfile();
			// econ 1010
			$e1010 = new Course();
			$e1010->set("courseNumber", 1010);
			$e1010->set("department", "ECON");
			$student->set("courses", $e1010);

			// econ 1012
			$e1012 = new Course();
			$e1012->set("courseNumber", 1012);
			$e1012->set("department", "ECON");
			$student->set("courses", $e1012);

			// econ 2750
			$e2750 = new Course();
			$e2750->set("courseNumber", 2750);
			$e2750->set("department", "ECON");
			$student->set("courses", $e2750);

			// econ 2900
			$e2900 = new Course();
			$e2900->set("courseNumber", 2900);
			$e2900->set("department", "ECON");
			$student->set("courses", $e2900);

			// econ 3010
			$e3010 = new Course();
			$e3010->set("courseNumber", 3010);
			$e3010->set("department", "ECON");
			$student->set("courses", $e3010);

			// econ 3012
			$e3012 = new Course();
			$e3012->set("courseNumber", 3012);
			$e3012->set("department", "ECON");
			$student->set("courses", $e3012);

			// econ 3950
			$e3950 = new Course();
			$e3950->set("courseNumber", 3950);
			$e3950->set("department", "ECON");
			$student->set("courses", $e3950);

			$econCheck = new EconRequirementsChecker($student);
			$test = $econCheck->get();
			$this->assertEquals(false, $test['requiredCourses']["result"]);
			$this->assertEquals(1, count($test['requiredCourses']['results']['missing']));
		}
	}
?>