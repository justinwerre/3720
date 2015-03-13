<?php
  require_once "Course.php";
  require_once "StudentProfile.php";
  require_once "RequirementsChecker.php";
  require_once "fileparser.php";

  $filename = $_FILES['file']['tmp_name'];
  $students = array();
  $parsedStudents = array();
  $checks = array();
  $parsedStudents = parseFile($filename, $students);
  foreach($parsedStudents as $student)
  {
    $requirementChecker = new RequirementsChecker($student);
    $check = $requirementChecker->get();
    $checks[] = $check;
    
  }
  header('Content-Type: application/json');
    echo json_encode(array(
    "gradCheck" => $checks,
    "studentProfile" => $parsedStudents
    ));
  
?>