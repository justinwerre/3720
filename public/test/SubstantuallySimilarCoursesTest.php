<?php
	require_once __DIR__."/../php/StudentProfile.php";
	require_once __DIR__."/../php/Course.php";


	class SimilarCourseTest extends PHPUnit_Framework_TestCase
	{
		public function test2900and2780()
		{
			$student = new StudentProfile();

			// econ 2900
			$econ = new Course();
			$econ->set("department", "ECON");
			$econ->set("courseNumber", 2900);
			$econ->set("weight", 3);
			$student->set("courses", $econ);

			// stats 2780
			$stats = new Course();
			$stats->set("department", "STAT");
			$stats->set("courseNumber", 2780);
			$stats->set("weight", 3);
			$student->set("courses", $stats);

			$this->assertEquals(false, $student->get("creditHours"));
		}
	}
?>