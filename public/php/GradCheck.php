<?php
  require_once "Course.php";
  require_once "StudentProfile.php";
  require_once "RequirementsChecker.php";
  require_once "fileparser.php";

  $filename = $_FILES['file']['tmp_name'];
  $students = array()
  $parsedStudents = parseFile($filename, $students);
  for ($i=0;$i<count($students);$i++)
  {
    $requirementChecker = new RequirementsChecker($student);
    $check = $requirementChecker->get();
    header('Content-Type: application/json');
    echo json_encode(array(
    "gradCheck" => $check,
    "studentProfile" => $student->toArray()
    ));
  }
  
?>