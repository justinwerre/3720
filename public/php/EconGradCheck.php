<?php
	require_once "RequirementsChecker.php"; 

	class EconGradCheck extends RequirementsChecker
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
		
		private function checkFourThousands()
		{
			$courses = $this->studentProfile->get('courses');
			$count = 0;
			foreach($courses as $course)
			{
				if($course->get('courseNumber') > 4000)
				{
					$count++;
				}
			}
			
			return array
			(
				'result' => $count > 3
			);
		}
	}
?>