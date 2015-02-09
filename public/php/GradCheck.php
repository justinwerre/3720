<?php
  require_once "Course.php";
  require_once "StudentProfile.php";
  require_once "RequirementsChecker.php";
  require_once "fileparser.php";

  $filename = $_FILES['file']['tmp_name'];
  $student = parseFile($filename);
  
  $requirementChecker = new RequirementsChecker($student);
  $check = $requirementChecker->get();
  header('Content-Type: application/json');
  echo json_encode($check);
?>