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
			$this->requirements['requiredCourses'] = $this->checkRequiredCourses();
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
			$econCourses = array();
			
			foreach($courses as $course)
			{
				if($course->get('courseNumber') >= 4000 && $course->get('department') == 'ECON')
				{
					$econCourses[] = $course->toArray();
				}
			}
			
			return array
			(
				'result' => count($econCourses) >= 3,
				'reason' => $econCourses
			);
		}
		
		// Checks the students courses to see if they have taken 14 econ classes
		// including stats 1770
		private function checkNumberClasses()
		{
			$courses = $this->studentProfile->get('courses');
			$econCourses = array();
			
			foreach($courses as $course)
			{
				if($course->get('department') == 'ECON' || 
					 ($course->get('department') == 'STAT' && $course->get('courseNumber') == 1770))
				{
					$econCourses[] = $course->toArray();
				}
			}
			
			return array
			(
				'result' => count($econCourses) >= 14,
				'reason' => $econCourses
			);
		}
		
		private function checkRequiredCourses()
		{
			$courses = $this->studentProfile->get('courses');
			$econCourses = array();
			
			if($courses[0]->get('department') == 'ECON' && 
				 ($courses[0]->get('courseNumber') == 1010 ||
					$courses[0]->get('courseNumber') == 1012 ||
					$courses[0]->get('courseNumber') == 2750 ||
					$courses[0]->get('courseNumber') == 2900 ||
					$courses[0]->get('courseNumber') == 3010 ||
					$courses[0]->get('courseNumber') == 3012 ||
					$courses[0]->get('courseNumber') == 3950
				 )
				)
			{
				$econCourses = $courses[0];
			}
			
			return array
			(
				'reason' => $econCourses
			);
		}
	}
?>