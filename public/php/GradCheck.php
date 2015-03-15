<?php
  require_once "Course.php";
  require_once "StudentProfile.php";
  require_once "RequirementsChecker.php";
	require_once "EconRequirementsChecker.php";
  require_once "fileparser.php";

  $filename = $_FILES['file']['tmp_name'];
  $students = array();
  $parsedStudents = array();
  $checks = array();
  $parsedStudents = parseFile($filename, $students);
	$studentResults = array();

  foreach($parsedStudents as $student)
  {
		$major = $student->get('major');
		
		if(trim($major) == "Economics")
		{
			$requirementChecker = new EconRequirementsChecker($student);
		}
		else
		{
			$requirementChecker = new RequirementsChecker($student);
		}
		
    $check = $requirementChecker->get();
    $studentResults[] = array
		(
			"gradCheck" => $check,
			"studentProfile" => $student->toArray()
		);
    
  }

  header('Content-Type: application/json');
  echo json_encode($studentResults);
  
?>