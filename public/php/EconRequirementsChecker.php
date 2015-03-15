<?php
	require_once "RequirementsChecker.php"; 

	class EconRequirementsChecker extends RequirementsChecker
	{
		private $requirements;
		private $studentProfile;
		
		public function __construct($sp)
		{
			// need to perform the requirements checking in the parent class
			// and mix the results in with the more specific testing performed 
			// in this class
			parent::__construct($sp);
			$this->requirements = parent::get();
			
			$this->studentProfile = $sp;
			$this->requirements["fourThousands"] = $this->checkFourThousands();
			$this->requirements['classes'] = $this->checkNumberClasses();
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
					$econCourses[] = $course->toArray();
				}
			}
			
			return array
			(
				'result' => $count >= 3,
				'reason' => $econCourses
			);
		}
		
		private function checkNumberClasses()
		{
			$courses = $this->studentProfile->get('courses');
			$count = 0;
			
			foreach($courses as $course)
			{
				if($course->get('department') == 'ECON' || 
					 ($course->get('department') == 'STAT' && $course->get('courseNumber') == 1770))
				{
					$count++;	
				}
			}
			
			return array
			(
				'result' => $count >= 14,
				'reason' => 0
			);
		}
	}
?>