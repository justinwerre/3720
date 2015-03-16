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
			$missingCourses = $this->listRequiredCourses();

			foreach($courses as $course){
				foreach($missingCourses as $key => $missing){
					if($course->get("department") == $missing['department'] && 
						$course->get('courseNumber') == $missing['course']){
						$econCourses[] = $course->toArray();
						unset($missingCourses[$key]);
					}
				}
			}
			
			return array
			(
				'result' => count($econCourses) == 8,
				'reason' => array(
					'taken' => $econCourses,
					'missing' => $missingCourses
					)
			);
		}

		private function listRequiredCourses()
		{
			return array(
				array('course' => 1010, 'department' => 'ECON'),
				array('course' => 1012, 'department' => 'ECON'),
				array('course' => 2750, 'department' => 'ECON'),
				array('course' => 2900, 'department' => 'ECON'),
				array('course' => 3010, 'department' => 'ECON'),
				array('course' => 3012, 'department' => 'ECON'),
				array('course' => 3950, 'department' => 'ECON'),
				array('course' => 1770, 'department' => 'STAT')
			);
		}
	}
?>