<?php
	require_once "RequirementsChecker.php"; 

	class EconGradCheck extends RequirementsChecker
	{
		private $requirements;

		public function __construct($studentProfile)
		{
			$this->requirements = array(
				"4thousands" => array("result" => false)
			);  
		}

		public function get(){
			return $this->requirements;
		}

		public function __destruct()
		{}
	}
?>