<?php
  require_once "Course.php";
  require_once "StudentProfile.php";
  require_once "RequirementsChecker.php";
  //require_once "fileparser.php";

  $filename = $_FILES['file']['tmp_name'];
  $student = new StudentProfile();
  $student->set("name", "Sara Plz");
  $student->set("faculty", "giraffe management");
  $student->set("program", "giraffe herd migration manamgent");
  $student->set("major", "giraffes");
  $student->set("creditHours", 150);
  $student->set("GPA", 1.0);

  for($i=0;$i<15;$i++){
    $course = new Course();
    $course->set("department", "GIRF");
    $course->set("courseNumber", 1000);
    $course->set("courseTitle", "Intro To Giraffes");
    $course->set("weight", 3);
    $course->set("totalPoints", 12);
    $student->set("courses", $course);
  }
  
  $requirementChecker = new RequirementsChecker($student);
  $check = $requirementChecker->get();
  header('Content-Type: application/json');
  echo json_encode($check);
?>