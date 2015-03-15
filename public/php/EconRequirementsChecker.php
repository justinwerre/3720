<?php
	require_once "RequirementsChecker.php"; 

	class EconRequirementsChecker extends RequirementsChecker
	{
		private $requirements;
		private $studentProfile;
		
		public function __construct($sp)
		{
			$this->studentProfile = $sp;
			$this->requirements = array(
				"4thousands" => $this->checkFourThousands()
			);  
		}

		public function get(){
			return $this->requirements;
		}

		public function __destruct()
		{}
		
		// Checks the students courses to see if they have taken 
		// four 4000 level economics courses
		private function checkFourThousands()
		{
			$courses = $this->studentProfile->get('courses');
			$count = 0;
			$econCourses = array();
			
			foreach($courses as $course)
			{
				if($course->get('courseNumber') >= 4000 && $course->get('department') == 'ECON')
				{
					$count++;
					$econCourses[] = $course;
				}
			}
			
			return array
			(
				'result' => $count >= 3,
				'reason' => $econCourses
			);
		}
	}
?>